<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Kelurahan extends BD_Controller{

  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_laporan');
    }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id_kecamatan');

    // kondisi jika id laporan tidak di temukan 
    
    if ($id === NULL) {
      
      // mengambil data dari database
      $laporan = $this->db->get('kelurahan')->result_array();
      
    }else{

      // mengambil data dengan id yang di kirim
      $laporan = $this->db->get_where('kelurahan', ['id_kecamatan'=> $id])->result_array();

    }

    if ($laporan) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $laporan,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'kelurahan tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }

  }

}