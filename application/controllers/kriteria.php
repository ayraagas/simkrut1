<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

	$content_data = array(
		'nama'		=> $session_data['username']
		);

	$this->load->view('header',$content_data);
	$this->load->view('sidebar_adm');
	$this->load->view('content_kriteria',$content_data);
	$this->load->view('footer');}else{
		redirect('login','refresh');
	}
	
}

}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria.php */