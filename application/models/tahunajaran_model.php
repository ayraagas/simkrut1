<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunajaran_model extends CI_Model {

	public function get_aktif() {
		$this->db->where("status", "1");
		return $this->db->get("tahun_ajaran")->row();
	}

	public function get_all() {
		return $this->db->get("tahun_ajaran")->result();
	}

	public function change_status($id,$data,$data1){


			$this->db->update('tahun_ajaran', $data1);

			$this->db->where('id', $id);
			$this->db->update('tahun_ajaran', $data);
		}

	public function tambah($data_thajaran) {
			$this->db->insert("tahun_ajaran",$data_thajaran);
	}

	public function get_graph_data($tipe) {
		$sql = "SELECT t.tahun, t.semester, (SELECT COUNT(*) FROM asisten a WHERE a.tipe = '$tipe' AND a.id_tahun_ajaran = t.id) AS jumlah FROM tahun_ajaran t";
		$query = $this->db->query($sql, FALSE);
		return $query->result();
	}
}

/* End of file tahun_ajaran_model.php */
/* Location: ./application/models/tahun_ajaran_model.php */