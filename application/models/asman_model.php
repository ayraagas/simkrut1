<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asman_model extends CI_Model {

	public function daftar($data_asman) {
		$this->db->update("mahasiswa", array(
			'ipk'	=> $data_asman['ipk']
		), "id = '{$data_asman['user_id']}'");

		$this->db->insert('asisten', array(
				'id_tahun_ajaran'	=> $data_asman['tahun_ajaran'],
				'id_mahasiswa' =>$data_asman['user_id'],
				'tipe' => $data_asman['tipe']
			));

		$thn = $data_asman['tahun_ajaran'];
		$id_mhs = $data_asman['user_id'];
		$tipe = $data_asman['tipe'];


		$id_asisten = $this->db->query("SELECT id FROM asisten WHERE id_tahun_ajaran =  $thn AND id_mahasiswa = $id_mhs AND tipe = '$tipe'")->row();

		foreach ($data_asman['matakuliah'] as $mk_id => $nilai) {
			$this->db->insert("data_asisten_mandiri", array(
				'id_matakuliah'		=> $mk_id,
				'nilai'			=> $nilai,
				'id_asisten'   => $id_asisten->id
			));
		}
	}

	public function check_daftar($id_mahasiswa, $id_tahun_ajaran) {
		$this->db->where("id_asisten", $id_mahasiswa);
		// $this->db->where("id_tahun_ajaran", $id_tahun_ajaran);
		return ($this->db->count_all_results("data_asisten_mandiri") > 0);
	}

}

/* End of file asman_model.php */
/* Location: ./application/models/asman_model.php */