<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function index()
  {
    $data['judul'] = 'Data Profile';
    $data['users_ses'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('backend/layouts/header', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/profile/index', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
    
  }

}

/* End of file Profile.php */