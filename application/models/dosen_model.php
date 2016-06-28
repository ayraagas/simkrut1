<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	public function get_all() {
		return $this->db->where_not_in('id',0)->order_by("nama")->get("dosen")->result();
	}
	public function get_all_daftar() {
		return $this->db->order_by("nama")->get("dosen")->result();
	}

	public function tambah($data_dosen) {
		$this->db->insert("dosen",$data_dosen);
	}

	public function delete_dosen($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('dosen');
		
	}

	public function get_dosen() {     
		$query = $this->db->get('dosen');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	public function insert_csv($data) {
		$this->db->insert('dosen', $data);
	}


}

/* End of file dosen_model.php */
/* Location: ./application/models/dosen_model.php */