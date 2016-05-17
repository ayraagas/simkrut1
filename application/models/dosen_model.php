<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	public function get_all() {
		return $this->db->order_by("nama")->get("dosen")->result();
	}


	public function tambah($data_dosen) {
			$this->db->insert("dosen",$data_dosen);
	}

}

/* End of file dosen_model.php */
/* Location: ./application/models/dosen_model.php */