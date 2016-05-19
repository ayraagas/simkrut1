<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('matakuliah_model');
		$this->load->model('tahunajaran_model');
		//Do your magic here
	}
	
	public function asman()
	{
		$session_data = $this->session->userdata('logged_in');
		$content_data = array(
			'matakuliah'  => $this->matakuliah_model->get_all(),
			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
			'nama'		=> $session_data['nama']
			);
		$this->load->view('header',$content_data);
		$this->load->view('sidebar_mhs');
		$this->load->view('content_asman_mhs',$content_data);
		$this->load->view('footer');
	}
}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */