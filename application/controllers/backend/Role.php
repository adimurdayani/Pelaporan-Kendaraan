<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_role');
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Tabel Role';
    $data['get_role'] = $this->m_role->get_all();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('tipe_user', 'Tipe user', 'trim|required');
    
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/tabel_role/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      $data = [
        'tipe_user' => $this->input->post('tipe_user'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i"),
      ];

      $this->db->insert('role_user', $data);
      
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      
      redirect('backend/role');
      
    }
  }

  public function edit()
  {
    $data['judul'] = 'Tabel Role';
    $data['get_role'] = $this->m_role->get_all();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('tipe_user', 'Tipe user', 'trim|required');
    
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/tabel_role/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      $id = $this->input->post('role_id');
      
      $data = [
        'tipe_user' => $this->input->post('tipe_user'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i"),
      ];

      $this->db->where('role_id', $id);
      
      $this->db->update('role_user', $data);
      
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      
      redirect('backend/role');
      
    }
  }

  public function hapus($id)
  {
    $this->db->delete('role_user', ['role_id'=>$id]);
    
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
    redirect('backend/role');
  }

}

/* End of file Role.php */