<?php
Class Login_model extends CI_Model
{
  function login($username, $password)
  {
    $this -> db -> select('id, username, password');
    $this -> db -> from('admin');
    $this -> db -> where('username', $username);
    $this -> db -> where('password', MD5($password));
    $this -> db -> limit(1);

    $query                  = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  function loginUser($nim, $password)
  {


    $this -> db -> select('id, nim, nama');
    $this -> db -> from('mahasiswa');
    $this -> db -> where('nim', $nim);
    $this -> db -> where('password', MD5($password));
    $this -> db -> where('status','1');
    $this -> db -> limit(1);

    $query                  = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  public function checkOldPass($passwordlama)
  {   $session_data       = $this->session->userdata('logged_in_mhs');
  $this->db->where('nama', $session_data['nama']);
  $this->db->where('password', MD5($passwordlama));
  $query                  = $this->db->get('mahasiswa');
  if($query->num_rows() > 0)
    return 1;
  else
    return 0;
}

public function saveNewPass($passwordbaru)
{
  $data                   = array(
    'password'              =>MD5($passwordbaru) 
    );
  $session_data           = $this->session->userdata('logged_in_mhs');
  $this->db->where('nama', $session_data['nama']);
  $this->db->update('mahasiswa', $data);
  return true;
}

}
?>