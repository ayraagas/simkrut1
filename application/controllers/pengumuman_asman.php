<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_asman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('asman_model');
		//Do your magic here
	}
	public function index()
	{
		$session_data = $this->session->userdata('logged_in');


 	$content_data = array(
 			'nama'		=> $session_data['nama'],
 			'pengumuman'=> $this->asman_model->pengumuman()
 			);
		$this->load->view('header',$content_data);
 		$this->load->view('sidebar_mhs');
 		$this->load->view('content_pengumuman_asman',$content_data);
 		$this->load->view('footer');
	}

}

/* End of file pengumuman_asman.php */
/* Location: ./application/controllers/pengumuman_asman.php */