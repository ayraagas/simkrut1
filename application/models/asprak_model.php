<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asprak_model extends CI_Model {

	public function daftar($data_asprak) {
		$this->db->update("mahasiswa", array(
			'angkatan'	=> $data_asprak['angkatan']
			), "id = '{$data_asprak['user_id']}'");
		$this->db->insert('asisten', array(
			'id_tahun_ajaran'	=> $data_asprak['tahun_ajaran'],
			'id_mahasiswa' =>$data_asprak['user_id'],
			'tipe' => $data_asprak['tipe']
			));

		$thn = $data_asprak['tahun_ajaran'];
		$id_mhs = $data_asprak['user_id'];
		$tipe = $data_asprak['tipe'];

// $id_asisten = $this->db->query("SELECT id FROM asisten WHERE id_tahun_ajaran =  $thn AND id_mahasiswa = {$data_asprak['user_id']} AND tipe = '$tipe'")->row();
		$id_asisten = $this->db->insert_id();

		foreach ($data_asprak['matakuliah'] as $mk_id => $nilai) {
			$this->db->insert("data_asisten_praktikum", array(
				'id_matakuliah'		=> $mk_id,
				'nilai'			=> $nilai,
				'id_asisten'   => $id_asisten
				));
		}
	}

	public function check_daftar($id_mahasiswa, $id_tahun_ajaran) {
		$this->db->where("id_mahasiswa", $id_mahasiswa);
		$this->db->where("id_tahun_ajaran", $id_tahun_ajaran);
		$this->db->where("tipe", 'Praktikum');
		return ($this->db->count_all_results("asisten") > 0);
	}

	public function check_tahun(){
		$query= $this->db->query("SELECT count(id) as jml FROM tahun_ajaran WHERE status = '1' ");
		return $query->row()->jml;
	}

	public function matakuliah(){
		$data_mk_asprak=$this->db->query("SELECT matakuliah.nama FROM matakuliah WHERE jenis='praktikum'");
		return $data_mk_asprak->result();

	}

	public function get_data_asprak(){
		$data_asprak= $this->db->query("SELECT a.id 'id_asprak', mhs.nama 'nama_mhs', mk.nama 'nama_mk', dap.nilai FROM mahasiswa mhs CROSS JOIN matakuliah mk JOIN asisten a ON (mhs.id=a.id_mahasiswa) LEFT JOIN data_asisten_praktikum dap ON (dap.id_asisten=a.id) AND (mk.id=dap.id_matakuliah) JOIN tahun_ajaran t ON (a.id_tahun_ajaran=t.id) WHERE mk.jenis='Praktikum' AND a.tipe = 'Praktikum' AND t.status = '1'");
		return $data_asprak->result();
	}

	public function terima($data_asprak){

	$query = $this->db->get_where('asisten', array(//making selection
		'id'	=> $data_asprak['id']
		));

	$this->db->update("asisten", array(
		'status'	=> $data_asprak['status'],
		), "id = '{$data_asprak['id']}'");
}

public function pengumuman(){

	$query=$this->db->query("SELECT mahasiswa.nama, m.nama 'matakuliah',dsn.nama 'dosen',d.kelas,tahun_ajaran.semester,tahun_ajaran.tahun
		FROM matakuliah m join data_asisten_praktikum d ON(m.id=d.id_matakuliah)
		join dosen dsn ON (dsn.id=d.id_dosen)join asisten on (asisten.id=d.id_asisten) join tahun_ajaran on(tahun_ajaran.id=asisten.id_tahun_ajaran) join mahasiswa on(mahasiswa.id= asisten.id_mahasiswa) WHERE d.kelas NOT IN('') AND dsn.id NOT IN('0')");
	return $query->result();
}

}

/* End of file asprak_model.php */
/* Location: ./application/models/asprak_model.php */