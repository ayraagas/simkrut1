<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('dosen_model');
	}

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');

		$content_data = array(
			'dosen'  => $this->dosen_model->get_all(),
			'nama'		=> $session_data['username']
			);

		$this->load->view('header',$content_data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_dosen',$content_data);
		$this->load->view('footer');
	}

	public function tambah() {

		$data_dosen = array(
			'nama'		=> $this->input->post('nama')
			);
		$this->dosen_model->tambah($data_dosen);

		redirect('datadosen','refresh');
	}
}

/* End of file datadosen.php */
/* Location: ./application/controllers/datadosen.php */