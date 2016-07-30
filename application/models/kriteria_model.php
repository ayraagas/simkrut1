<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

	public function get_all() {
		return $this->db->get("kriteria")->result();
	}
	public function tambah($data_kriteria){
		$this->db->insert("kriteria",$data_kriteria);
	}

	public function ubah($id,$data_kriteria){
		$this->db->where('id', $id);
		$this->db->update('kriteria', $data_kriteria); 
	}
	public function delete($id){
		$this->db->delete('kriteria', array('id' => $id)); 

	}

	public function kriteria_specific(){
		$query= $this->db->query("SELECT id, nama FROM kriteria WHERE id NOT IN (SELECT id_kriteria FROM nilai_kriteria )");
		return $query->result();
	}
}

/* End of file kriteria_model.php */
/* Location: ./application/models/kriteria_model.php */