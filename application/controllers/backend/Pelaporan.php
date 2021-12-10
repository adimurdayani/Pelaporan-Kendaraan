<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaporan extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_laporan');
    $this->load->model('m_referensi');
    
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Tabel Pelaporan';
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['data_laporan'] = $this->m_laporan->get_all();
    $data['data_kecamatan'] = $this->m_referensi->get_all_kecamatan();
    $data['data_user'] = $this->db->get('users')->result_array();

    $this->form_validation->set_rules('nama_pelapor', 'nama pelapor', 'trim|required');
    $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required');
    $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required');

    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/pelaporan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...        
      
      $config['upload_path']    = './assets/images/uploads/';
      $config['allowed_types']  = 'jpg|png|jpeg';
      $config['max_size']       = '1024';
      $config['encrypt_name']		= TRUE;
      
      $this->load->library('upload', $config);

      if (!empty($_FILES['stnk'])) {
        # code...
        $this->upload->do_upload('stnk');
        $data_stnk = $this->upload->data();
        $file_stnk = $data_stnk['file_name'];
      }

      if (!empty($_FILES['bpkb'])) {
        # code...
        $this->upload->do_upload('bpkb');
        $data_bpkb = $this->upload->data();
        $file_bpkb = $data_bpkb['file_name'];
      }

      $data = [
          'nama_pelapor'  => $this->input->post('nama_pelapor'),
          'kelamin'       => $this->input->post('kelamin'),
          'id_kelurahan'  => $this->input->post('id_kelurahan'),
          'id_kecamatan'  => $this->input->post('id_kecamatan'),
          'no_ktp'        => $this->input->post('no_ktp'),
          'no_kk'         => $this->input->post('no_kk'),
          'no_ken'        => $this->input->post('no_ken'),
          'stnk'          => $file_stnk,
          'bpkb'          => $file_bpkb,
          'latitude'      => $this->input->post('latitude'),
          'longitude'     => $this->input->post('longitude'),
          'keterangan'    => $this->input->post('keterangan'),
          'created_at'    => date("d M Y H:i"),
          'updated_at'    => date("d M Y H:i"),
          'status'        => "MENUNGGU"
          
        ];

        $this->db->insert('laporan', $data);
        $this->session->set_flashdata(
          'message', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil tersimpan!
          </div>'
        );
        redirect('backend/pelaporan');
      
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Tabel Pelaporan';
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['data_laporan'] = $this->m_laporan->get_all();
    $data['data_kecamatan'] = $this->m_referensi->get_all_kecamatan();

    $id_kecamatan = $this->input->post('id_kecamatan');
    
    $data['data_kelurahan'] = $this->m_referensi->get_id_kecamatan($id_kecamatan);

    $this->form_validation->set_rules('id', 'id pelapor', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/pelaporan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      
      $id = $this->input->post('id');
      $nama_pelapor = $this->input->post('nama_pelapor');

      $data = [
        'status' => $this->input->post('status')
      ];

      $this->db->where('id', $id);
      $this->db->update('laporan', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      $this->sendMassage($nama_pelapor);
      redirect('backend/pelaporan');
      
    }
  }

  public function hapus($id)
  {
    $this->db->delete('laporan', ['id' => $id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/pelaporan');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Laporan';
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_laporan_id'] = $this->m_laporan->get_id_laporan($id);
    $this->load->view('backend/layouts/header', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/pelaporan/detail', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
  }

  public function get_id_kecamatan()
  {
    $id_kecamatan = $this->input->post('id', true);
    
    $data = $this->m_referensi->get_id_kecamatan($id_kecamatan)->result();
    echo json_encode($data);
  }

  public function sendMassage($user_id){
    
    $gettoken = $this->db->get_where('users', ['id' => $user_id])->row();
    $getstatus = $this->db->get_where('laporan', ['nama_pelapor' => $user_id])->row();

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
                        "title": "Pelaporan",
                        "body": "Laporan anda telah '.$getstatus->status.' dan sementara ditindak lanjuti oleh pihak kepolisian"
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
    redirect('backend/pelaporan');

    if ($err) {
      // echo "cURL Error #:" . $err;
      json_encode($err);
    } else {
      // response ketika data berhasil disimpan
      echo $response;
    }
  }

}

/* End of file Pelaporan.php */