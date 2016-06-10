<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tahunajaran_model');
		//Do your magic here
	}

	public function asman()
	{
		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$content_data = array(
			'nama'		=> $session_data['username']
			);

		$this->load->view('header',$content_data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_grafik_asman',$content_data);
		$this->load->view('footer');}else{
			redirect('login','refresh');
		}
		
	}

	public function asprak()
	{
		if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');

		$content_data = array(
			'nama'		=> $session_data['username']
			);

		$this->load->view('header',$content_data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_grafik_asprak',$content_data);
		$this->load->view('footer');}else{
			redirect('login','refresh');
		}
		
	}

}

/* End of file grafik.php */
/* Location: ./application/controllers/grafik.php */