<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Laporan extends BD_Controller
{

  function __construct()
  {
    // Construct the parent class
    parent::__construct();
    $this->load->model('m_laporan');
  }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id');

    // kondisi jika id laporan tidak di temukan 

    if ($id === NULL) {

      // mengambil data dari database
      $laporan = $this->m_laporan->get_laporan_all();
    } else {

      // mengambil data dengan id yang di kirim
      $laporan = $this->m_laporan->get_laporan_all($id);
    }

    if ($laporan) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $laporan,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'laporan tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function laporanuser_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('nama_pelapor');

    // kondisi jika id laporan tidak di temukan 

    if ($id === NULL) {

      // mengambil data dari database
      $laporan = $this->m_laporan->get_laporan_all();
    } else {

      // mengambil data dengan id yang di kirim
      $laporan = $this->m_laporan->get_id($id);
    }

    if ($laporan) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $laporan,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'laporan tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function terkirim_get()
  {

    $status = $this->get('status');

    if ($status === null) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'message' => 'status laporan tidak ditemukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    } else {

      // mengambil data dari database
      $laporan = $this->m_laporan->get_laporan_terkirim($status);
    }

    if ($laporan) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $laporan,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'laporan tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function dalamproses_get()
  {

    $status = $this->get('status');

    if ($status === null) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'message' => 'status laporan tidak ditemukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    } else {

      // mengambil data dari database
      $laporan = $this->m_laporan->get_laporan_dalamproses($status);
    }

    if ($laporan) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $laporan,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'laporan tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  # MENAMPILKAN DATA
  public function index_post()
  {

    $config['upload_path']    = './assets/images/uploads/';
    $config['allowed_types']  = 'jpg|png';
    $config['max_size']       = '1024';
    $config['encrypt_name']    = TRUE;

    $this->load->library('upload', $config);

    if (!empty($_FILES['stnk'])) {
      # code...

      $this->upload->do_upload('stnk');
      $data_stnk = $this->upload->data();
      $file_stnk = $data_stnk['file_name'];
    } else {

      // response ketika gambar bermasalah
      $this->response([
        'status'  => false,
        'message' => 'file tidak terupload'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }

    // kirim data yang akan di simpan ke dalam database
    $data = [
      'nama_pelapor'  => $this->post('nama_pelapor'),
      'kelamin'       => $this->post('kelamin'),
      'id_kelurahan'  => $this->post('id_kelurahan'),
      'id_kecamatan'  => $this->post('id_kecamatan'),
      'no_ktp'        => $this->post('no_ktp'),
      'no_kk'         => $this->post('no_kk'),
      'no_ken'        => $this->post('no_ken'),
      'stnk'          => $file_stnk,
      'latitude'      => $this->post('latitude'),
      'longitude'     => $this->post('longitude'),
      'keterangan'    => $this->post('keterangan'),
      'created_at'    => date("d M Y H:i"),
      'updated_at'    => date("d M Y H:i"),
      'status'        => "MENUNGGU"
    ];

    // proses data yang di kirim ke database
    if ($this->m_laporan->add_laporan($data) > 0) {

      // response jika data yang di kirim ada
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'laporan berhasil disimpan'
      ], REST_Controller::HTTP_CREATED);
    } else {

      // jika data yang di kirim tidak valid
      $this->response([
        'status' => false,
        'message' => 'data gagal tersimpan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  # MENGEDIT DATA
  public function edit_post()
  {

    $config['upload_path']    = './assets/images/uploads/';
    $config['allowed_types']  = 'jpg|png';
    $config['max_size']       = '1024';
    $config['encrypt_name']    = TRUE;

    $this->load->library('upload', $config);

    if (!empty($_FILES['stnk'])) {
      # code...

      $this->upload->do_upload('stnk');
      $data_stnk = $this->upload->data();
      $file_stnk = $data_stnk['file_name'];
    } else {

      // response ketika gambar bermasalah
      $this->response([
        'status'  => false,
        'message' => 'file tidak terupload'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }

    $id = $this->post('id');

    $this->m_laporan->delete_old_stnk($id);
    $this->m_laporan->delete_old_bpkb($id);

    // kirim data yang akan di simpan ke dalam database
    $data = [
      'nama_pelapor'  => $this->post('nama_pelapor'),
      'kelamin'       => $this->post('kelamin'),
      'id_kelurahan'  => $this->post('id_kelurahan'),
      'id_kecamatan'  => $this->post('id_kecamatan'),
      'no_ktp'        => $this->post('no_ktp'),
      'no_kk'         => $this->post('no_kk'),
      'no_ken'        => $this->post('no_ken'),
      'stnk'          => $file_stnk,
      'latitude'      => $this->post('latitude'),
      'longitude'     => $this->post('longitude'),
      'keterangan'    => $this->post('keterangan'),
      'created_at'    => date("d M Y H:i"),
      'updated_at'    => date("d M Y H:i"),
      'status'        => 2
    ];

    // jalankan fungsi edit data berdasarkan data yang di kirim
    if ($this->m_laporan->edit_laporan($data, $id) > 0) {

      // response data yang telah berhasil di kirim
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'data berhasil di ubah'
      ], REST_Controller::HTTP_OK);
    } else {

      // response data yang tidak berhasil di ubah
      $this->response([
        'status'  => false,
        'message' => 'data yang diubah gagal'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  # MENGHAPUS DATA
  public function index_delete()
  {
    // ambil id yang akan di hapus
    $id = $this->delete('id');

    if ($id === null) {

      // jika id tidak tersedia
      $this->response([
        'status'  => false,
        'message' => 'id tidak tersedia'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {

      // menjalankan aksi delete data

      if ($this->m_laporan->delete_laporan($id) > 0) {

        // jika id ditemukan maka, aksi hapus data mendapat response
        $this->response([
          'status'  => true,
          'data'    => $id,
          'message' => 'data terhapus'
        ], REST_Controller::HTTP_OK);
      } else {

        // jika id ditemukan maka, aksi hapus data mendapat response
        $this->response([
          'status'  => false,
          'message' => 'id tidak ditemukan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function total_get()
  {
    $id = $this->get('nama_pelapor');

    if ($id === null) {
      # code...
      $jml_selesai = $this->m_laporan->selesai();
    } else {
      $jml_selesai = $this->m_laporan->selesai_id($id);
    }

    if ($jml_selesai) {
      $this->response([
        'status'  => true,
        'data'    => $jml_selesai,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status'  => false,
        'message' => 'data tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  public function totalmenunggu_get()
  {
    $id = $this->get('nama_pelapor');
    if ($id === null) {
      $jml_menunggu = $this->m_laporan->menunggu();
    } else {
      $jml_menunggu = $this->m_laporan->menunggu_id($id);
    }

    if ($jml_menunggu) {
      $this->response([
        'status'  => true,
        'data'    => $jml_menunggu,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status'  => false,
        'message' => 'data tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }
}
