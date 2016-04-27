<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran_model extends CI_Model {

	public function get_aktif() {
		$this->db->where("status", "1");
		return $this->db->get("tahun_ajaran")->row();
	}

}

/* End of file tahun_ajaran_model.php */
/* Location: ./application/models/tahun_ajaran_model.php */