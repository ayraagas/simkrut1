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


		// $id_asisten = $this->db->query("SELECT id FROM asisten WHERE id_tahun_ajaran =  $thn AND id_mahasiswa = {$data_asman['user_id']} AND tipe = '$tipe'")->row();
		$id_asisten = $this->db->insert_id();

		foreach ($data_asman['matakuliah'] as $mk_id => $nilai) {
			$this->db->insert("data_asisten_mandiri", array(
				'id_matakuliah'		=> $mk_id,
				'nilai'			=> $nilai,
				'id_asisten'   => $id_asisten
				));
		}
	}

	public function check_daftar($id_mahasiswa, $id_tahun_ajaran) {
		$this->db->where("id_mahasiswa", $id_mahasiswa);
		$this->db->where("id_tahun_ajaran", $id_tahun_ajaran);
		$this->db->where("tipe", 'Mandiri');
		return ($this->db->count_all_results("asisten") > 0);
	}

	public function check_tahun(){
		$query= $this->db->query("SELECT count(id) as jml FROM tahun_ajaran WHERE status = '1' ");
		return $query->row()->jml;
	}

	public function get_data_asman(){
		$data_asman= $this->db->query("SELECT d.id 'id',mk.nama 'matakuliah', mhs.nama 'namamahasiswa', d.nilai 'nilai', mhs.ipk 'ipk', dsn.nama 'namadosen', d.kelas 'kelas' FROM matakuliah mk JOIN data_asisten_mandiri d on (mk.id=d.id_matakuliah) JOIN asisten a on (d.id_asisten=a.id) JOIN mahasiswa mhs on (mhs.id=a.id_mahasiswa) join tahun_ajaran t ON (a.id_tahun_ajaran=t.id) left join dosen dsn on (dsn.id=d.id_dosen) WHERE t.status='1' ORDER BY matakuliah, ipk desc");
		return $data_asman->result();
	}

	public function terima($data_asman){

        $query = $this->db->get_where('data_asisten_mandiri', array(//making selection
        	'id'	=> $data_asman['id_asisten']
        	));

        $count = $query->num_rows(); //counting result from query

        $this->db->update("data_asisten_mandiri", array(
        	'id_dosen'	=> $data_asman['id_dosen'],
        	'kelas'	=> $data_asman['kelas']
        	), "id = '{$data_asman['id_asisten']}'");
        

		// $this->db->insert('asisten_dosen', array(
		// 	'id_asisten_mandiri'	=> $data_asman['id_asisten'],
		// 	'id_dosen' 				=>$data_asman['id_dosen']
		// 	));
    }

    public function pengumuman(){

    	$query=$this->db->query("SELECT mahasiswa.nama, m.nama 'matakuliah',dsn.nama 'dosen',d.kelas,tahun_ajaran.semester,tahun_ajaran.tahun
    		FROM matakuliah m join data_asisten_mandiri d ON(m.id=d.id_matakuliah)
    		join dosen dsn ON (dsn.id=d.id_dosen)join asisten on (asisten.id=d.id_asisten) join tahun_ajaran on(tahun_ajaran.id=asisten.id_tahun_ajaran) join mahasiswa on(mahasiswa.id= asisten.id_mahasiswa) WHERE d.kelas NOT IN('') AND dsn.id NOT IN('0')");
    	return $query->result();
    }
}

/* End of file asman_model.php */
/* Location: ./application/models/asman_model.php */