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
	// 	$thn = $data_asprak['tahun_ajaran'];
	// 	$id_mhs = $data_asprak['user_id'];
	// 	$tipe = $data_asprak['tipe'];
	// $id_asisten = $this->db->query("SELECT id FROM asisten WHERE id_tahun_ajaran =  $thn AND id_mahasiswa = {$data_asprak['user_id']} AND tipe = '$tipe'")->row();

		$id_asisten = $this->db->insert_id();

		$this->db->insert('alternatif',array(
			'nama'=> $data_asprak['nama'],
			'id_asisten'=>$id_asisten
			));

		foreach ($data_asprak['matakuliah'] as $mk_id => $nilai) {
			$this->db->insert("data_asisten_praktikum", array(
				'id_matakuliah'		=> $mk_id,
				'nilai'			=> $nilai,
				'id_asisten'   => $id_asisten
				));
		}
	}
		public function ubah_angkatan($data_asprak){
			$this->db->update("mahasiswa", array(
			'angkatan'	=> $data_asprak['angkatan']
			), "id = '{$data_asprak['user_id']}'");
	}
	
	public function delete_asprak($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('asisten');
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

	public function get_data_alternatif(){
		$data_alternatif=$this->db->query("SELECT alt.id 'id', alt.nama, mhs.angkatan, alt.hasil,a.status, alt.id_asisten
			FROM alternatif alt JOIN asisten a ON (alt.id_asisten=a.id) JOIN mahasiswa mhs ON (mhs.id=a.id_mahasiswa)
			WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum')");
		return $data_alternatif->result();
	}

	public function get_data_nilai_kri_alternatif(){
		$data_nilai_sub_alternatif=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt',kri.id 'id_kri',kri.nama 'nama_kri',nilaikri.nilai FROM alternatif alt CROSS JOIN kriteria kri LEFT JOIN nilai_kriteria nilaikri ON (kri.id=nilaikri.id_kriteria) AND (alt.id=nilaikri.id_alternatif) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum')");
		return $data_nilai_sub_alternatif->result();
	}

	public function get_data_nilai_sub_alternatif(){
		$data_nilai_sub_alternatif=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt',sub.nama 'nama_sub',nilaisub.nilai FROM alternatif alt CROSS JOIN subkriteria sub LEFT JOIN nilai_subkriteria nilaisub ON (sub.id=nilaisub.id_subkriteria) AND (alt.id=nilaisub.id_alternatif) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum')");
		return $data_nilai_sub_alternatif->result();
	}

	public function get_data_alternatif_null_nilai(){
		$data_alternatif_null_nilai = $this->db->query("SELECT alt.id 'id', alt.nama, mhs.angkatan, alt.hasil,a.status, alt.id_asisten FROM alternatif alt JOIN asisten a ON (alt.id_asisten=a.id) JOIN mahasiswa mhs ON (mhs.id=a.id_mahasiswa) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') AND alt.id NOT IN (SELECT id_alternatif FROM nilai_subkriteria)
			");
		return $data_alternatif_null_nilai->result();
	}

	public function get_data_alternatif_null_nilai_kriteria(){
		$data_alternatif_null_nilai_kriteria = $this->db->query("SELECT alt.id 'id', alt.nama, mhs.angkatan, alt.hasil,a.status, alt.id_asisten FROM alternatif alt JOIN asisten a ON (alt.id_asisten=a.id) JOIN mahasiswa mhs ON (mhs.id=a.id_mahasiswa) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') AND alt.id NOT IN (SELECT id_alternatif FROM nilai_kriteria WHERE id_kriteria NOT IN(SELECT id FROM kriteria)) ORDER BY nama
			");
		return $data_alternatif_null_nilai_kriteria->result();
	}

	public function tambahnilaisub($data_nilai_sub){
		$id_alt= $data_nilai_sub['alternatif'];

		foreach ($data_nilai_sub['subkriteria'] as $sk_id => $nilai) {
			$this->db->insert("nilai_subkriteria", array(
				'id_alternatif'		=> $id_alt,
				'id_subkriteria'   => $sk_id,
				'nilai'			=> $nilai
				));
		}
		

	}

	public function perangkingan_saw(){
		
		$query_jml_kriteria= array('jumlah'=>$this->db->query("SELECT COUNT(DISTINCT(id_kriteria)) as jumlah FROM subkriteria")->row()->jumlah);
		extract($query_jml_kriteria);

		$query_kriteria= $this->db->query("SELECT DISTINCT(id_kriteria) as kriteria FROM subkriteria")->result_array();
		$idkriteria= array();
		foreach ($query_kriteria as $row) {
			if(!in_array($row['kriteria'],$idkriteria)){
				$idkriteria[]=$row['kriteria'];
			}
		}

		for ($i=0; $i < $jumlah; $i++) { 

			$ranking= $this->db->query("SELECT a.id_alternatif 'id_alternatif',d.id_kriteria 'id_kriteria',SUM( IF(c.kategori='benefit', a.nilai/c.normalization, c.normalization/a.nilai) * c.bobot ) 'nilai' FROM nilai_subkriteria a JOIN alternatif b ON (b.id=a.id_alternatif IN((SELECT id from alternatif WHERE id_asisten IN(SELECT id from asisten WHERE id_tahun_ajaran = (SELECT id from tahun_ajaran WHERE status='1') AND tipe='Praktikum')))) JOIN ( SELECT a.id_subkriteria, ROUND(IF(b.kategori='benefit',MAX(a.nilai),MIN(a.nilai)),1) AS normalization, b.kategori, b.bobot FROM nilai_subkriteria a JOIN subkriteria b ON(b.id=a.id_subkriteria) WHERE b.id_kriteria='$idkriteria[$i]' AND a.id_alternatif IN ((SELECT id from alternatif WHERE id_asisten IN(SELECT id from asisten WHERE id_tahun_ajaran = (SELECT id from tahun_ajaran WHERE status='1') AND tipe='Praktikum'))) GROUP BY a.id_subkriteria ) c ON (c.id_subkriteria=a.id_subkriteria)JOIN subkriteria d ON(a.id_subkriteria=d.id) GROUP BY a.id_alternatif ORDER BY `id_alternatif` ASC")->result_array();

			foreach ($ranking as $ar) {
				$data_ar= array(
					'id_alternatif'=> $ar['id_alternatif'],
					'id_kriteria' => $ar['id_kriteria'],
					'nilai'=> $ar['nilai']
					);

				$query = $this->db->get_where('nilai_kriteria', array(
					'id_alternatif'	=> $data_ar['id_alternatif'],
					'id_kriteria'   => $data_ar['id_kriteria']
					));

				$count = $query->num_rows();

				if ($count == '0') {
					$this->db->insert('nilai_kriteria',$data_ar);
				} else {

					$this->db->where('id_alternatif',"{$data_ar['id_alternatif']}");
					$this->db->where('id_kriteria',"{$data_ar['id_kriteria']}");
					$this->db->update("nilai_kriteria",$data_ar);

				}

			}
		}
	}
	public function reset_nilai_sub($id){
		$this->db->where('id_alternatif', $id);
		$this->db->delete('nilai_subkriteria');
	}

	public function terima($id){

		$query= $this->db->query("SELECT status FROM asisten WHERE id=$id")->row()->status;

		if ($query == '0') {
			$this->db->update("asisten", array(
				'status'	=> '1',
				), "id = '{$id}'");
		} else {
			$this->db->update("asisten", array(
				'status'	=> '0',
				), "id = '{$id}'");
		}
	}


	public function tambahnilaikri($data_nilai_kri){

		$id_alt= $data_nilai_kri['alternatif'];

		$this->db->where('id_alternatif',$id_alt);
		$this->db->delete('nilai_kriteria');

		foreach ($data_nilai_kri['kriteria'] as $k_id => $nilai) {
			$this->db->insert("nilai_kriteria", array(
				'id_alternatif'		=> $id_alt,
				'id_kriteria'   => $k_id,
				'nilai'			=> $nilai
				));
		}
	}

	public function perangkingan_topsis(){

		$query_topsis = $this->db->query("SELECT a.id 'id_alternatif', a.nama 'nama_alternatif', k.nama 'nama_kriteria', n.nilai 'nilai', k.bobot 'bobot', k.kategori 'kategori' FROM nilai_kriteria n JOIN alternatif a ON (a.id=n.id_alternatif) AND n.id_alternatif IN(SELECT id from alternatif WHERE id_asisten IN(SELECT id from asisten WHERE id_tahun_ajaran = (SELECT id from tahun_ajaran WHERE status='1') AND tipe='Praktikum')) JOIN kriteria k ON(k.id=n.id_kriteria)
			")->result_array();


		$data=array();
		$kriterias=array();
		$id_alternatifs=array();
		$bobot=array();
		$atribut=array();
		$nilai_kuadrat=array();

		foreach ($query_topsis as $qt) {
			if(!isset($data[$qt['nama_alternatif']])){
				$data[$qt['nama_alternatif']]=array();
			}
			if(!isset($data[$qt['nama_alternatif']][$qt['nama_kriteria']])){
				$data[$qt['nama_alternatif']][$qt['nama_kriteria']]=array();
			}
			if(!isset($nilai_kuadrat[$qt['nama_kriteria']])){
				$nilai_kuadrat[$qt['nama_kriteria']]=0;
			}
			$bobot[$qt['nama_kriteria']]=$qt['bobot'];
			$atribut[$qt['nama_kriteria']]=$qt['kategori'];
			$data[$qt['nama_alternatif']][$qt['nama_kriteria']]=$qt['nilai'];
			$nilai_kuadrat[$qt['nama_kriteria']]+=pow($qt['nilai'],2);
			$kriterias[]=$qt['nama_kriteria'];
			$id_alternatifs[]=$qt['id_alternatif'];
		}
		$kriteria=array_unique($kriterias);
		// var_dump($kriteria);exit;
		$id_alternatif=$this->db->query("SELECT id from alternatif WHERE id_asisten IN(SELECT id from asisten WHERE id_tahun_ajaran = (SELECT id from tahun_ajaran WHERE status='1'))
			")->result_array();
		$id_alternatif=array_unique($id_alternatifs);
		$id_alternatif = array_values($id_alternatif);

		$jml_kriteria=count($kriteria);
		$i=0;
		$y=array();
		foreach($data as $nama=>$krit){
			++$i;
			foreach($kriteria as $k){  
				$y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)*$bobot[$k];       
			}

		}

		$yplus=array();
		foreach($kriteria as $k){
			$yplus[$k]=($atribut[$k]=='benefit'?max($y[$k]):min($y[$k]));
		}
		// var_dump($yplus);exit;

		$ymin=array();
		foreach($kriteria as $k){
			$ymin[$k]=$atribut[$k]=='cost'?max($y[$k]):min($y[$k]);

		}
		// var_dump($ymin);exit;

		$i=0;
		$dplus=array();
		foreach($data as $nama=>$krit){
			++$i;
			foreach($kriteria as $k){  
				if(!isset($dplus[$i-1])) $dplus[$i-1]=0;
				$dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);

			}
			
		}

		$i=0;
		$dmin=array();
		foreach($data as $nama=>$krit){
			++$i;
			foreach($kriteria as $k){  
				if(!isset($dmin[$i-1]))$dmin[$i-1]=0;
				$dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
			}

		}

		$i=0;
		$V=array();
		foreach($data as $nama=>$krit){
			++$i;
			foreach($kriteria as $k){  
				$V[$i-1]=round(sqrt($dmin[$i-1]),6)/(round(sqrt($dmin[$i-1]),6)+round(sqrt($dplus[$i-1]),6));

				$object=array(
					'hasil' => $V[$i-1]
					);
				$this->db->where('id',$id_alternatif[$i-1]);
				$this->db->update("alternatif",$object);
			}

		}
	}


	public function ubahnilaikriteria($id){

		$query=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt', kri.id 'id_kri',kri.nama 'nama_kri',nilaikri.nilai FROM alternatif alt CROSS JOIN kriteria kri LEFT JOIN nilai_kriteria nilaikri ON (kri.id=nilaikri.id_kriteria) AND (alt.id=nilaikri.id_alternatif) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') AND alt.id='$id'");
		return $query->result();
	}

public function get_graph_data() {
		$sql = "SELECT alt.nama, mhs.angkatan, alt.hasil
			FROM alternatif alt JOIN asisten a ON (alt.id_asisten=a.id) JOIN mahasiswa mhs ON (mhs.id=a.id_mahasiswa)
			WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') order by hasil desc";
		$query = $this->db->query($sql, FALSE);
		return $query->result();
	}


	public function pengumuman(){

		$query=$this->db->query("SELECT mahasiswa.nama, ta.semester,ta.tahun FROM asisten a join tahun_ajaran ta on(ta.id=a.id_tahun_ajaran) join mahasiswa on(mahasiswa.id= a.id_mahasiswa) WHERE a.status = '1' AND tipe='Praktikum'");
		return $query->result();
	}

}

/* End of file asprak_model.php */
/* Location: ./application/models/asprak_model.php */