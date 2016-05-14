<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataasman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['nama'] = $session_data['username'];
		$this->load->view('header',$data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_asman_adm');
		$this->load->view('footer');
	}

}

/* End of file data.php */
/* Location: ./application/controllers/data.php */