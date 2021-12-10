<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_users');
    $this->load->model('m_laporan');
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Dashboard';
    $data['get_jumlah'] = $this->m_users->get_jumlah();
    $data['get_jumlah_laporan'] = $this->db->get('laporan')->num_rows();
    $data['data_laporan'] = $this->m_laporan->get_all();
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('backend/layouts/header', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/dashboard', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
    
  }

}

/* End of file Dashboard.php */