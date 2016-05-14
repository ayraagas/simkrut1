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

  $query = $this -> db -> get();

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

  $query = $this -> db -> get();

  if($query -> num_rows() == 1)
  {
   return $query->result();
 }
 else
 {
   return false;
 }}


}
?>