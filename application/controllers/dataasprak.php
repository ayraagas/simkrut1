<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataasprak extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model('asprak_model');
		$this->load->model('tahunajaran_model');
		$this->load->model('kriteria_model');
		$this->load->model('subkriteria_model');
	//Do your magic here
	}

	public function index()
	{

	}

	public function pendaftar(){

		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$chk_thn 	  =	 $this->asprak_model->check_tahun();

		$content_data = array(
			'asisten_praktikum'  => $this->asprak_model->get_data_asprak(),
			'nama'		=> $session_data['username'],
			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
			'matakuliah' => $this->asprak_model->matakuliah()
			);

		if ($chk_thn == '0') {
			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nonaktif');
			$this->load->view('footer');
		}else{

			$dataNilai =[];
			$dataId=[];
			foreach ($this->asprak_model->get_data_asprak() as $asprak) {
				$dataNilai[$asprak->nama_mhs][$asprak->nama_mk]=$asprak->nilai;
				$dataId=[$asprak->id_asprak];
			}
			$content_data['dataNilai'] = $dataNilai;
			$content_data['dataId'] = $dataId;


			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_pendaftar',$content_data);
			$this->load->view('footer');
		}}else{
			redirect('login','refresh');
		}
	}

	public function alternatif(){

		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$chk_thn 	  =	 $this->asprak_model->check_tahun();

		$content_data = array(
			'alternatif'  => $this->asprak_model->get_data_alternatif(),
			'nama'		=> $session_data['username'],
			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
			'matakuliah' => $this->asprak_model->matakuliah()
			);

		if ($chk_thn == '0') {
			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nonaktif');
			$this->load->view('footer');
		}else{

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_alternatif',$content_data);
			$this->load->view('footer');
		}}else{
			redirect('login','refresh');
		}
	}

	public function nilaisubkriteria(){

		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$chk_thn 	  =	 $this->asprak_model->check_tahun();

		$content_data = array(
			'subkriteria' => $this->subkriteria_model->view_all(),
			'nama'		=> $session_data['username'],
			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
			'matakuliah' => $this->asprak_model->matakuliah(),
			'alternatif' => $this->asprak_model->get_data_alternatif_null_nilai()
			);

		$dataNilaiSub =[];

		foreach ($this->asprak_model->get_data_nilai_sub_alternatif() as $subalt) {
			$dataNilaiSub[$subalt->nama_alt]['id']=$subalt->id;
			$dataNilaiSub[$subalt->nama_alt]['nilai'][$subalt->nama_sub]=$subalt->nilai;
		}
		$content_data['dataNilaiSub'] = $dataNilaiSub;

		if ($chk_thn == '0') {
			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nonaktif');
			$this->load->view('footer');
		}else{

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nilai_sub',$content_data);
			$this->load->view('footer');
		}}else{
			redirect('login','refresh');
		}
	}

	public function tambahnilaisub(){

		if ($post_data = $this->input->post()) {
			$this->_tambahnilaisub_submit($post_data);
			return;
		}
		redirect('dataasprak/nilaisubkriteria','refresh');
	}

	private function _tambahnilaisub_submit($post_data) {
		$session_data = $this->session->userdata('logged_in');
		$data_nilai_sub = array(
			'alternatif'	=> $post_data['alternatif'],
			'subkriteria'	=> array()
			);
		foreach ($post_data['subkriteria'] as $sk_id => $nilai) {
			if (!empty($nilai)) {
				$data_nilai_sub['subkriteria'][$sk_id] = $nilai;
			}
		}
		$this->asprak_model->tambahnilaisub($data_nilai_sub);

		redirect('dataasprak/tambahnilaisub','refresh');
	}

	public function resetnilaisub(){

		$id= $this->input->get('id');
		$this->asprak_model->reset_nilai_sub($id);

		redirect('dataasprak/nilaisubkriteria','refresh');

	}


	public function nilaikriteria(){

		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$chk_thn 	  =	 $this->asprak_model->check_tahun();

		$content_data = array(
			'kriteria' => $this->kriteria_model->get_all(),
			'nama'		=> $session_data['username'],
			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
			'matakuliah' => $this->asprak_model->matakuliah()
			);

		$dataNilaiKri =[];
		$dataIdAlt=[];
		foreach ($this->asprak_model->get_data_nilai_kri_alternatif() as $subkri) {
			$dataNilaiKri[$subkri->nama_alt][$subkri->nama_kri]=$subkri->nilai;
			$dataIdAlt=[$subkri->id];
		}
		$content_data['dataNilaiKri'] = $dataNilaiKri;
		$content_data['dataIdAlt'] = $dataIdAlt;

		if ($chk_thn == '0') {
			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nonaktif');
			$this->load->view('footer');
		}else{

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_nilai_kri',$content_data);
			$this->load->view('footer');
		}}else{
			redirect('login','refresh');
		}
	}

	public function terima(){

		$id= $this->input->get('id');
		$this->asprak_model->terima($id);
		redirect('dataasprak/alternatif','refresh');
	}

	public function delete(){
		$id= $this->input->get('id');
		$this->asprak_model->delete_asprak($id);
		if ($this->db->_error_number() == 1451)
		{

			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];

			$content_data = array(
				'asisten_praktikum'  => $this->asprak_model->get_data_asprak(),
				'nama'		=> $session_data['username'],
				'tahunajaran' => $this->tahunajaran_model->get_aktif(),
				'matakuliah' => $this->asprak_model->matakuliah()
				);

			$dataNilai =[];
			$dataId=[];
			foreach ($this->asprak_model->get_data_asprak() as $asprak) {
				$dataNilai[$asprak->nama_mhs][$asprak->nama_mk]=$asprak->nilai;
				$dataId=[$asprak->id_asprak];
			}
			$content_data['dataNilai'] = $dataNilai;
			$content_data['dataId'] = $dataId;
			$this->load->view('header',$data);
			$this->load->view('sweetalert/alertdelete');
			$this->load->view('sidebar_adm');
			$this->load->view('content_asprak_adm_alternatif', $content_data);
			$this->load->view('footer');
		} else{
			redirect('dataasprak/alternatif','refresh');
		}
	}

}

/* End of file dataasprak.php */
/* Location: ./application/controllers/dataasprak.php */