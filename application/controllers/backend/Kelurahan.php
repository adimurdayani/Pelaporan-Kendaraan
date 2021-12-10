<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_referensi');
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Tabel Kelurahan';
    $data['data_kelurahan'] = $this->m_referensi->get_all_kelurahan();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required|is_unique[kelurahan.kelurahan]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/kelurahan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      
      $data = [
        'kelurahan' => $this->input->post('kelurahan'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->insert('kelurahan', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/kelurahan');
    }

  }

  public function edit()
  {
    $data['judul'] = 'Tabel Kelurahan';
    $data['data_kelurahan'] = $this->m_referensi->get_all_kelurahan();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/kelurahan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {

      $id  = $this->input->post('id');
      
      $data = [
        'kelurahan' => $this->input->post('kelurahan'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->where('id', $id);
      $this->db->update('kelurahan', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      redirect('backend/kelurahan');
    }
  }

  public function hapus($id)
  {
    # code...
    $this->db->delete('kelurahan', ['id' => $id]);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/kelurahan');
  }

}

/* End of file Kelurahan.php */