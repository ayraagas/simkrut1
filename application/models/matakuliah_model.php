<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah_model extends CI_Model {

	public function get_all() {
		return $this->db->order_by("nama")->get("matakuliah")->result();
	}


	public function tambah($data_mk) {
			$this->db->insert("matakuliah",$data_mk);
	}

	public function delete_mk($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('matakuliah');
	}

	public function delete_mk_all()
	{
		$this->db->empty_table('matakuliah');
	}

	public function insert_csv($data) {
		$this->db->insert('matakuliah', $data);
	}
}

/* End of file matakuliah_model.php */
/* Location: ./application/models/matakuliah_model.php */