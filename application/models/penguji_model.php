<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penguji_model extends CI_Model {

	public function get_all_penguji() {
		return $this->db->order_by("nama")->get("penguji")->result();
	}

	public function tambah($data_penguji) {
		$this->db->insert("penguji",$data_penguji);
	}


	public function delete_penguji($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('penguji');
		
	}

	public function get_all_kriteria() {
		return $this->db->order_by("nama")->get("kriteria")->result();
	}

	public function get_all_penguji_kriteria() {
		return $this->db->query("SELECT pk.id 'id', p.nama 'nama_penguji',k.nama 'nama_kriteria' FROM penguji p JOIN penguji_kriteria pk ON (p.id=pk.id_penguji) JOIN kriteria k ON (k.id=pk.id_kriteria) ")->result();
	}

	public function tambah_penilai($data_penilai) {
		$this->db->insert("penguji_kriteria",$data_penilai);
	}

	public function delete_penilai($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('penguji_kriteria');
		
	}

	public function get_subkriteria($id_penguji){
		return $this->db->query("SELECT * FROM subkriteria WHERE id_kriteria IN (SELECT id_kriteria FROM penguji_kriteria WHERE id_penguji=$id_penguji)")->result();
	}

	public function get_data_nilai_sub_alternatif($id_penguji){
		$data_nilai_sub_alternatif=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt',sub.nama 'nama_sub',nilaisub.nilai FROM alternatif alt CROSS JOIN subkriteria sub LEFT JOIN nilai_penguji_subkriteria nilaisub ON (sub.id=nilaisub.id_subkriteria) AND (alt.id=nilaisub.id_alternatif) AND nilaisub.id_penguji='$id_penguji' WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') ");
		return $data_nilai_sub_alternatif->result();
	}

	public function get_kriteria($id_penguji){
		return $this->db->query("SELECT * FROM kriteria WHERE id IN (SELECT id_kriteria FROM penguji_kriteria WHERE id_penguji=$id_penguji) AND id NOT IN (SELECT id_kriteria FROM subkriteria)")->result();
	}

	public function get_data_nilai_kri_alternatif($id_penguji){
		$data_nilai_sub_alternatif=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt',kri.id 'id_kri',kri.nama 'nama_kri',nilaikri.nilai FROM alternatif alt CROSS JOIN kriteria kri LEFT JOIN nilai_penguji_kriteria nilaikri ON (kri.id=nilaikri.id_kriteria) AND (alt.id=nilaikri.id_alternatif) AND nilaikri.id_penguji='$id_penguji' WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum')");
		return $data_nilai_sub_alternatif->result();
	}


	public function ubahnilaisubkriteria($id,$id_penguji){

		$query=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt', kri.id 'id_kri',kri.nama 'nama_kri',nilaikri.nilai 'nilai' FROM alternatif alt CROSS JOIN subkriteria kri LEFT JOIN nilai_penguji_subkriteria nilaikri ON (kri.id=nilaikri.id_subkriteria) AND (alt.id=nilaikri.id_alternatif) AND nilaikri.id_penguji='$id_penguji' WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') AND alt.id='$id' AND kri.id_kriteria IN (SELECT id_kriteria FROM penguji_kriteria WHERE id_penguji='$id_penguji')
");
		return $query->result();
	}

	public function ubahnilaikriteria($id,$id_penguji){

		$query=$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt', kri.id 'id_kri',kri.nama 'nama_kri',nilaikri.nilai 'nilai' FROM alternatif alt CROSS JOIN kriteria kri LEFT JOIN nilai_penguji_kriteria nilaikri ON (kri.id=nilaikri.id_kriteria) AND (alt.id=nilaikri.id_alternatif) AND nilaikri.id_penguji='$id_penguji' WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') AND alt.id='$id' AND kri.id IN (SELECT id_kriteria FROM penguji_kriteria WHERE id_penguji='$id_penguji') AND kri.id NOT IN (SELECT id_kriteria FROM subkriteria)");
		return $query->result();
	}




    public function tambahnilaikri($data_nilai_kri){

    	$id_alt= $data_nilai_kri['alternatif'];
    	$id_penguji = $data_nilai_kri['id_penguji'];


    	$this->db->where('id_alternatif',$id_alt);
    	$this->db->where('id_penguji',$id_penguji);
    	$this->db->delete('nilai_penguji_kriteria');

    	foreach ($data_nilai_kri['kriteria'] as $k_id => $nilai) {
    		$this->db->insert("nilai_penguji_kriteria", array(
    			'id_penguji'	=> $data_nilai_kri['id_penguji'],
    			'id_alternatif'		=> $id_alt,
    			'id_kriteria'   => $k_id,
    			'nilai'			=> $nilai
    			));
    	}
    }


    public function tambahnilaisub($data_nilai_sub){

    	$id_alt= $data_nilai_sub['alternatif'];
		$id_penguji = $data_nilai_sub['id_penguji'];

    	$this->db->where('id_alternatif',$id_alt);
    	$this->db->where('id_penguji',$id_penguji);
    	$this->db->delete('nilai_penguji_subkriteria');

    	foreach ($data_nilai_sub['subkriteria'] as $sk_id => $nilai) {
    		$this->db->insert("nilai_penguji_subkriteria", array(
    			'id_penguji'	=> $id_penguji ,
    			'id_alternatif'		=> $id_alt,
    			'id_subkriteria'   => $sk_id,
    			'nilai'			=> $nilai
    			));
    	}
    }

    public function masuknilaisub(){
    		$this->db->query("SELECT alt.id 'id',alt.nama 'nama_alt',sub.nama 'nama_sub', AVG(nilaisub.nilai) 'rata' FROM alternatif alt CROSS JOIN subkriteria sub LEFT JOIN nilai_penguji_subkriteria nilaisub ON (sub.id=nilaisub.id_subkriteria) AND (alt.id=nilaisub.id_alternatif) WHERE alt.id_asisten IN ( SELECT id FROM asisten WHERE id_tahun_ajaran = (SELECT id FROM tahun_ajaran WHERE status='1') AND tipe = 'Praktikum') GROUP BY nama_alt,nama_sub HAVING rata IS NOT NULL")->result();
    }






}

/* End of file penguji_model.php */
/* Location: ./application/models/penguji_model.php */