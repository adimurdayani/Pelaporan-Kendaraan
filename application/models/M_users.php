<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

  public function get_all()
  {
    $query = 
    " SELECT `users`.*,`role_user`.`tipe_user`
      FROM `users` 
      JOIN `role_user` ON `users`.`user_id` = `role_user`.`role_id`
      WHERE `users`.`id` != 1
    ";
    return $this->db->query($query)->result_array();
  }

  public function get_jumlah()
  {
    return $this->db->get('users')->num_rows();
  }

  function get_username($username)
  {
    return $this->db->get_where('users', $username);
  }

  public function get_user($id = null)
  {

    if ($id == null) {
      # code...
      return $this->db->get('users')->result_array();
    }else {
      # code...
      return $this->db->get_where('users', ['id' => $id])->result_array();
    }
  }

  public function logout($id)
  {
    $this->db->delete('users', ['id' => $id]);
    return $this->db->affected_rows();
  }

}

/* End of file M_users.php */