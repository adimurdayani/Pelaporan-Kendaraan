<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class User extends BD_Controller
{

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
      } else {
        // response ketika data berhasil disimpan
        $this->response([
          'status' => true,
          'message' => 'Data berhasil di simpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);
      }
    }
  }

  public function upload_post()
  {
    $config['upload_path']    = './assets/images/users/';
    $config['allowed_types']  = 'jpg|png|jpeg';
    $config['max_size']       = '1024';
    $config['encrypt_name']    = TRUE;

    $this->load->library('upload', $config);

    if (!empty($_FILES['image'])) {
      # code...
      $this->upload->do_upload('image');
      $data_image = $this->upload->data();
      $file_image = $data_image['file_name'];
    } else {

      // response ketika gambar bermasalah
      $this->response([
        'status'  => false,
        'message' => 'file tidak terupload'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }

    $id = $this->input->post('id');

    $data = [
      'created_at'    => date("d M Y H:i"),
      'updated_at'    => date("d M Y H:i"),
      'image'  => $file_image
    ];

    // proses data yang di kirim ke database
    if ($this->m_laporan->upload_image($data, $id) > 0) {

      // response jika data yang di kirim ada
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'foto berhasil terupload'
      ], REST_Controller::HTTP_CREATED);
    } else {

      // jika data yang di kirim tidak valid
      $this->response([
        'status' => false,
        'message' => 'foto gagal terupload'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  public function index_get()
  {
    $id = $this->get('id');

    if ($id === null) {
      $user = $this->db->get('users')->result_array();
    } else {
      $user = $this->db->get_where('users', ['id' => $id])->row_array();
    }

    if ($user) {
      $this->response([
        'status'  => true,
        'data'    => $user,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status'  => false,
        'message' => 'user tidak ditemukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }
}
