<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_asprak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('asprak_model');
		//Do your magic here
	}
	public function index()
	{
		if($this->session->userdata('logged_in_mhs')){
			$session_data = $this->session->userdata('logged_in_mhs');
			$content_data = array(
				'nama'		=> $session_data['nama'],
				'pengumuman'=> $this->asprak_model->pengumuman()
				);
			$this->load->view('header_mhs',$content_data);
			$this->load->view('sidebar_mhs');
			$this->load->view('content_pengumuman_asprak',$content_data);
			$this->load->view('footer');}else{
				redirect('login','refresh');
			}

		}

	}

	/* End of file pengumuman_asman.php */
/* Location: ./application/controllers/pengumuman_asman.php */