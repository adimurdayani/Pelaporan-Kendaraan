<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

  
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
    $data['judul'] = 'Tabel Kecamatan';
    $data['data_kecamatan'] = $this->m_referensi->get_all_kecamatan();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required|is_unique[Kecamatan.kecamatan]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/kecamatan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      
      $data = [
        'kecamatan' => $this->input->post('kecamatan'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->insert('kecamatan', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/kecamatan');
    }

  }

  public function edit()
  {
    $data['judul'] = 'Tabel Kecamatan';
    $data['data_kecamatan'] = $this->m_referensi->get_all_kecamatan();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/header', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/kecamatan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {

      $id = $this->input->post('id');
      
      $data = [
        'kecamatan' => $this->input->post('kecamatan'),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->where('id', $id);      
      $this->db->update('kecamatan', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      redirect('backend/kecamatan');
    }
  }

  public function hapus($id)
  {
    $this->db->delete('kecamatan', ['id' => $id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/kecamatan');
    
  }

}

/* End of file Kecamatan.php */