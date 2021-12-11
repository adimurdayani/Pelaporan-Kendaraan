<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller{

  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_users');
    }

    public function login_post()
    {
      $username = $this->post('username'); //data input username
      $password = sha1($this->post('password')); //data input password
      $user_arr = array('username' => $username);

      $val = $this->m_users->get_username($user_arr)->row();

      if ($this->m_users->get_username($user_arr)->num_rows() == 0) {
        
        $this->response([
          'status' => false,
          'message' => 'Username tidak di temukan'
        ], REST_Controller::HTTP_NOT_FOUND);

      }

      $match = $val->password; //mengambil data password dari database
      $status = $val->user_active;

      if ($password === $match) { //kondisi jika password yang di input sama dengan password yang ada di database
        
        if ($status != 0) {
          $this->response([
            'status' => true,
            'message' => 'Login sukses',
            'data' => $val
          ], REST_Controller::HTTP_OK); //response jika data berhasil digunakan untuk login
        }else{
          $this->response([
            'status' => false,
            'message' => 'Akun anda belum diverifikasi'
          ]); //response jika data tidak ditemukan
        }

      }else {
        
        $this->response([
          'status' => false,
          'message' => 'Password salah'
        ]); //response jika data tidak ditemukan

      }
    }

    public function register_post()
    {

      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('email', 'email', 'trim|required');

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
        $data = [
          'nama' => htmlspecialchars($this->input->post('nama', true)),
          'username' => htmlspecialchars($this->input->post('username', true)),
          'email' => htmlspecialchars($this->input->post('email', true)),
          'password' => sha1($this->input->post('password')),
          'user_id' => 2,
          'user_active' => 0,
          'created_at' => date("d M Y H:i"),
          'updated_at' => date("d M Y H:i"),
          'token' => $this->input->post('token')          
        ];

        $output = $this->db->insert('users', $data);

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

    public function logout_get(){
      $this->session->sess_destroy();
        
      $this->response([
        "status" => true,
        "message"=> "logout sukses"
      ], REST_Controller::HTTP_OK);


    }
    
}