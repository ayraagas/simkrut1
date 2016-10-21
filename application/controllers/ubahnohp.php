<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahnohp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login/login_model');
	}

	public function index()
	{	
		if($this->session->userdata('logged_in_mhs')){
			$session_data = $this->session->userdata('logged_in_mhs');

			$content_data = array(
				'nama'		=> $session_data['nama'],
				'no_telp'	=> $this->login_model->lihatnohp()
				);
			// var_dump($content_data['no_telp']);
			// exit;
			$this->load->view('header_mhs',$content_data);
			$this->load->view('sidebar_mhs');
			$this->load->view('content_ubahnohp',$content_data);
			$this->load->view('footer');}else{
				redirect('login','refresh');
			}
		}

		public function change(){
			if ($post_data = $this->input->post()) {
				$this->_change_submit($post_data);
				return;
			}
		}


		private function _change_submit($post_data){
			$no_telp = $post_data['no_telp'];
			$this->login_model->ubahnohp($no_telp);
			redirect('ubahnohp','refresh');
	}
}

/* End of file ubahpass.php */
/* Location: ./application/controllers/ubahpass.php */