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

	public function ubahIpk($data_asman){
		$this->db->update("mahasiswa", array(
			'ipk'	=> $data_asman['ipk']
			), "id = '{$data_asman['user_id']}'");
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

	public function get_data_asman_1(){
		$data_asman= $this->db->query("SELECT mk.nama 'nama', mhs.nim 'nim', mhs.nama 'nama_mhs', mhs.no_telp 'no_telp', dam.nilai 'nilai' FROM mahasiswa mhs JOIN asisten a ON (mhs.id=a.id_mahasiswa) JOIN data_asisten_mandiri dam ON (dam.id_asisten=a.id) JOIN matakuliah mk ON (mk.id=dam.id_matakuliah) JOIN tahun_ajaran ta ON (ta.id=a.id_tahun_ajaran) WHERE ta.status='1' ORDER BY nama, mhs.nama
			");
		return $data_asman->result();
	}

	public function importExcel(){		   
		$fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
		while($csv_line = fgetcsv($fp,1024)) 
		{
			for ($i = 0, $j = count($csv_line); $i < $j; $i++) 
			{


				$insert_csv = array();
				$insert_csv['matakuliah'] = $csv_line[0];
				$insert_csv['nama_mahasiswa'] = $csv_line[1];
				$insert_csv['nama_dosen'] = $csv_line[2];
				$insert_csv['kelas'] = $csv_line[3];

			}

			$data = array(
				'matakuliah' => $insert_csv['matakuliah'] ,
				'nama_mahasiswa' => $insert_csv['nama_mahasiswa'],
				'nama_dosen' => $insert_csv['nama_dosen'],
				'kelas' => $insert_csv['kelas']);

			$query = $this->db->query("SELECT id FROM dosen WHERE nama LIKE '$data[nama_dosen]'");
			// var_dump($data[nama_dosen]);exit;
			$id_dosen= array();
			foreach ($query->result_array() as $row) {
				$id_dosen[0]=$row['id'];
			}
			$query1 = $this->db->query("SELECT id FROM matakuliah WHERE nama LIKE '$data[matakuliah]'");
			$id_makul= array();
			foreach ($query1->result_array() as $row) {
				$id_makul[0]=$row['id'];
			}
			$query2 = $this->db->query("SELECT DISTINCT(dam.id_asisten) 'id' FROM data_asisten_mandiri dam JOIN asisten a ON (dam.id_asisten=a.id) JOIN mahasiswa m ON (a.id_mahasiswa=m.id) WHERE m.id = ((SELECT id FROM mahasiswa WHERE nama LIKE '$data[nama_mahasiswa]')) AND a.id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1')");
				$id_asisten= array();
			foreach ($query2->result_array() as $row) {
				$id_asisten[0]=$row['id'];
			}

			$query3 = $this->db->query("UPDATE data_asisten_mandiri
				SET id_dosen = '$id_dosen[0]', kelas = '$data[kelas]'
				WHERE 
				id_matakuliah = '$id_makul[0]' AND 
				id_asisten = '$id_asisten[0]'");
			// var_dump($query1);exit;

		}
		fclose($fp) or die("can't close file");
		$data['success']="success";
		return $data;
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