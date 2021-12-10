<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class User extends BD_Controller{

  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_laporan');
    }

  public function index_post()
  {
    $this->form_validation->set_rules('password', 'password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      if (validation_errors() == true) {

        # response ketika username sudah digunakan 
        $this->response([
          'status' => false,
          'message' => 'Ada data yang sudah digunakan'
        ], REST_Controller::HTTP_BAD_REQUEST);

      }    

    } else {
      # inisial data yang akan di input kedalam database
      $id = $this->input->post('id');
      
      $data = [
        'password' => sha1($this->input->post('password')),
        'created_at' => date("d M Y H:i"),
        'updated_at' => date("d M Y H:i")
        
      ];

      $this->db->where('id', $id);
      
      $output = $this->db->update('users', $data);

      if ($output == 0) {
      // response ketika data gagal di simpan
        $this->response([
          'status' => false,
          'message' => 'Data gagal di simpan'
        ], REST_Controller::HTTP_NOT_FOUND);

      }else {
        // response ketika data berhasil disimpan
        $this->response([
          'status' => true,
          'message' => 'Data berhasil di simpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);

      }
    }

  }

}