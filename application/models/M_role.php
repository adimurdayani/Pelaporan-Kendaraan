<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

  public function get_all()
  {
    $this->db->where('role_id !=', 1);
    return $this->db->get('role_user')->result_array();
  }

}

/* End of file M_role.php */