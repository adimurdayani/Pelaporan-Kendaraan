<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_users');
    $this->load->model('m_role');
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Tabel Users';
    $data['get_role'] = $this->m_role->get_all();
    $data['get_users'] = $this->m_users->get_all();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('konf_pass', 'konfirmasi password', 'trim|required|min_length[6]|matches[password]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/users/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => sha1($this->input->post('password')),
        'user_id' => $this->input->post('user_id'),
        'user_active' => 0,
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
        
      ];

      $this->db->insert('users', $data);
      
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/users');
    }
  }

  public function edit()
  {
    $data['judul'] = 'Tabel Users';
    $data['get_role'] = $this->m_role->get_all();
    $data['get_users'] = $this->m_users->get_all();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('user_active', 'user active', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/users/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'user_active' => $this->input->post('user_active')
      ];

      $this->db->where('id', $id);
      
      $this->db->update('users', $data);
      
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      $this->sendMassage($id);
      redirect('backend/users');
    }
  }

  public function hapus($id)
  {
    $this->db->delete('users', ['id'=>$id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/users');
    
  }
  
  public function sendMassage($id){
    
    $gettoken = $this->db->get_where('users', ['id' => $id])->row();

    $getAll = '["'.$gettoken->token.'"]';
    $curl = curl_init();
    $authKey = "key=AAAAd4l8OVk:APA91bG5zmAoZ_b-ToKVhUpN_Qj9MVNeJ5TkhukYoYX96pEVIBjKlpsNL7wgT0Lr7A_0TBvXl_7Ep3inm-aHzygfQQNs1tCImsuBwh5VuyC_JC9czFoNZSreJytv39DZBW2Ono-WKKCL";
    $registration_ids =  $getAll;
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => '{
                    "registration_ids": ' . $registration_ids . ',
                    "notification": {
                        "title": "Verifikasi Akun",
                        "body": "Akun anda telah aktif, sekarang anda bisa melakukan proses login!"
                    }
                  }',
      CURLOPT_HTTPHEADER => array(
        "Authorization: " . $authKey,
        "Content-Type: application/json",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    redirect('backend/users');

    if ($err) {
      // echo "cURL Error #:" . $err;
      json_encode($err);
    } else {
      // response ketika data berhasil disimpan
      echo $response;
    }
  }

}

/* End of file Users.php */