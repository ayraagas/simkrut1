<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataasprak extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model('asprak_model');
		$this->load->model('tahunajaran_model');
	//Do your magic here
	}

	public function index()
	{

	}

	public function alternatif(){

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
			$this->load->view('content_asprak_alternatif_adm',$content_data);
			$this->load->view('footer');
		}}else{
			redirect('login','refresh');
		}
	}

}

/* End of file dataasprak.php */
/* Location: ./application/controllers/dataasprak.php */