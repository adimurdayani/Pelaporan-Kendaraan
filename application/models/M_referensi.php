<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_referensi extends CI_Model {

  public function get_all_kecamatan()
  {
    return $this->db->get('kecamatan')->result_array();
  }

  public function get_all_kelurahan()
  {
    return $this->db->get('kelurahan')->result_array();
  }

  public function get_id_kecamatan($id_kecamatan)
  {
    return $this->db->get_where('kelurahan', ['id_kecamatan' => $id_kecamatan]);
  }

}

/* End of file M_kecamatan.php */