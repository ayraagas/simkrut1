<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Matakuliah_model');
	}

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['nama'] = $session_data['username'];

		$content_data = array(
			'matakuliah'  => $this->Matakuliah_model->get_all()
			);
		$this->load->view('header',$data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_mk', $content_data);
		$this->load->view('footer');
	}


	public function tambah() {

		$data_mk = array(
			'nama'		=> $this->input->post('nama'),
			'semester'	=> $this->input->post('semester'),
			'jenis'		=> $this->input->post('jenis')
			);
		$this->Matakuliah_model->tambah($data_mk);

		redirect('datamk','refresh');
	}



}

/* End of file datamk.php */
/* Location: ./application/controllers/datamk.php */