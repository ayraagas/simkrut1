<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asman_model extends CI_Model {

	public function daftar($data_asman) {
		$this->db->update("mahasiswa", array(
			'ipk'	=> $data_asman['ipk']
		), "id = '{$data_asman['user_id']}'");
		foreach ($data_asman['matakuliah'] as $mk_id => $nilai) {
			$this->db->insert("data_asisten_mandiri", array(
				'id_matakuliah'		=> $mk_id,
				'id_mahasiswa'		=> $data_asman['user_id'],
				'id_tahun_ajaran'	=> $data_asman['tahun_ajaran'],
				'nilai_mk'			=> $nilai
			));
		}
	}

	public function check_daftar($id_mahasiswa, $id_tahun_ajaran) {
		$this->db->where("id_mahasiswa", $id_mahasiswa);
		$this->db->where("id_tahun_ajaran", $id_tahun_ajaran);
		return ($this->db->count_all_results("data_asisten_mandiri") > 0);
	}

}
a

/* End of file asman_model.php */
/* Location: ./application/models/asman_model.php */