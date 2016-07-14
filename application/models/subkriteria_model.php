<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria_model extends CI_Model {

	public function get_all($id_kriteria) {
		
		return $this->db->get_where("subkriteria", array('id_kriteria' => $id_kriteria))->result();
	}

	public function view_all(){
		return $this->db->get('subkriteria')->result();
	}


	public function tambah($data_subkriteria){
		$this->db->insert("subkriteria",$data_subkriteria);
	}

	public function ubah($id,$data_subkriteria){
		$this->db->where('id', $id);
		$this->db->update('subkriteria', $data_subkriteria); 
	}
	public function delete($id){
		$this->db->delete('subkriteria', array('id' => $id)); 

	}

}

/* End of file subkriteria_model.php */
/* Location: ./application/models/subkriteria_model.php */