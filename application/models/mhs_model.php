<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {

	public function get_all() {
		return $this->db->order_by("nama")->get("mahasiswa")->result();
	}

	public function change_status($id,$data){
		$this->db->where('id', $id);
		$this->db->update('mahasiswa', $data);
	}

	public function delete_mhs($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}
}

/* End of file mhs_model.php */
/* Location: ./application/models/mhs_model.php */