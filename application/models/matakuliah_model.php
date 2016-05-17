<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah_model extends CI_Model {

	public function get_all() {
		return $this->db->order_by("nama")->get("matakuliah")->result();
	}


	public function tambah($data_mk) {
			$this->db->insert("matakuliah",$data_mk);
	}
}

/* End of file matakuliah_model.php */
/* Location: ./application/models/matakuliah_model.php */