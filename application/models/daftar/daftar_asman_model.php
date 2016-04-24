<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_asman_model extends CI_Model {

	public function index()
	{
		# code...
	}

	public function insert($data){
		return $this->db->insert('data_mahasiswa', $data);
	}

	// public function tampil(){
	// 	return $this->db->get->('mahasiswa');
	// }

	

}

/* End of file daftar_asman_model.php */
/* Location: ./application/models/daftar/daftar_asman_model.php */