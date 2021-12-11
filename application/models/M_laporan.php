<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

  public function get_all()
  {
    $query = "SELECT  `laporan`.*, `kecamatan`.`kecamatan`, `kelurahan`.`kelurahan`,`users`.`nama`
              FROM `laporan`
              JOIN `kecamatan` ON `laporan`.`id_kecamatan` = `kecamatan`.`id`
              JOIN `kelurahan` ON `laporan`.`id_kelurahan` = `kelurahan`.`id`
              JOIN `users` ON `laporan`.`nama_pelapor` = `users`.`id`
              ORDER BY `id` DESC
              ";
    return $this->db->query($query)->result_array();
  }

  public function get_id_laporan($id)
  {
    $query = "SELECT  `laporan`.*, `kecamatan`.`kecamatan`, `kelurahan`.`kelurahan`,`users`.`nama`
              FROM `laporan`
              JOIN `kecamatan` ON `laporan`.`id_kecamatan` = `kecamatan`.`id`
              JOIN `kelurahan` ON `laporan`.`id_kelurahan` = `kelurahan`.`id`
              JOIN `users` ON `laporan`.`nama_pelapor` = `users`.`id`
              WHERE `laporan`.`nama_pelapor` = $id
              ";
    return $this->db->query($query)->row_array();
  }

  public function get_id($id)
  {
    $query = "SELECT  `laporan`.*, `kecamatan`.`kecamatan`, `kelurahan`.`kelurahan`,`users`.`nama`
              FROM `laporan`
              JOIN `kecamatan` ON `laporan`.`id_kecamatan` = `kecamatan`.`id`
              JOIN `kelurahan` ON `laporan`.`id_kelurahan` = `kelurahan`.`id`
              JOIN `users` ON `laporan`.`nama_pelapor` = `users`.`id`
              WHERE `laporan`.`nama_pelapor` = $id
              ";
    return $this->db->query($query)->result_array();
  }

  public function get_laporan_all($id = null)
  {
    if ($id == null) {

      $query = "SELECT  `laporan`.*, `kecamatan`.`kecamatan`, `kelurahan`.`kelurahan`,`users`.`nama`
                FROM `laporan`
                JOIN `kecamatan` ON `laporan`.`id_kecamatan` = `kecamatan`.`id`
                JOIN `kelurahan` ON `laporan`.`id_kelurahan` = `kelurahan`.`id`
                JOIN `users` ON `laporan`.`nama_pelapor` = `users`.`id`
                ";
      return $this->db->query($query)->result_array();

    }else {

      $query = "SELECT  `laporan`.*, `kecamatan`.`kecamatan`, `kelurahan`.`kelurahan`, `users`.`nama`
                FROM `laporan`
                JOIN `kecamatan` ON `laporan`.`id_kecamatan` = `kecamatan`.`id`
                JOIN `kelurahan` ON `laporan`.`id_kelurahan` = `kelurahan`.`id`
                JOIN `users` ON `laporan`.`nama_pelapor` = `users`.`id`
                WHERE `laporan`.`id` = $id
                ";
      return $this->db->query($query)->row_array();
      
    }
  }

  public function get_laporan_terkirim($status)
  {    
    if ($status == 2) {
      # code...
      return $this->db->get_where('laporan', ['status' =>2])->result_array();
      
    }
  }

  public function get_laporan_dalamproses($status)
  {    
    if ($status == 1) {
      # code...
      return $this->db->get_where('laporan', ['status' => 1])->result_array();
      
    }
  }

  public function delete_laporan($id)
  {
    $this->db->delete('laporan', ['id' => $id]);
    return $this->db->affected_rows();
  }

  public function add_laporan($data)
  {
    $this->db->insert('laporan', $data);
    return $this->db->affected_rows();
  }

  public function delete_old_stnk($id)
  {
    $query = $this->db->query("SELECT stnk FROM `".$this->db->dbprefix('laporan')."` WHERE id = '".$id."' ");
    $row = $query->row();
    $lokasiImg = ("./assets/images/uploads/" . $row->stnk );
    unlink($lokasiImg);
  }

  public function delete_old_bpkb($id)
  {
    $query = $this->db->query("SELECT bpkb FROM `".$this->db->dbprefix('laporan')."` WHERE id = '".$id."' ");
    $row = $query->row();
    $lokasiImge = ("./assets/images/uploads/" . $row->bpkb );
    unlink($lokasiImge);
  }

  public function edit_laporan($data, $id)
  {
    $this->db->update('laporan', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }

}

/* End of file M_laporan.php */