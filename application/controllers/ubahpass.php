<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahpass extends CI_Controller {

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
				'nama'		=> $session_data['nama']
				);

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_mhs');
			$this->load->view('content_ubahpass',$content_data);
			$this->load->view('footer');}else{
				redirect('login','refresh');
			}
		}

		public function change(){
			if ($post_data = $this->input->post()) {
				$this->_change_submit($post_data);
				return;
			}
			$session_data = $this->session->userdata('logged_in_mhs');

			$content_data = array(
				'nama'		=> $session_data['nama']
				);
			$this->load->view('header',$content_data);
			$this->load->view('sidebar_mhs');
			$this->load->view('content_ubahpass',$content_data);
			$this->load->view('footer');
			$this->load->view('sweetalert/alertchangepass');
			
		}

		private function _change_submit($post_data){

			$passwordlama = $post_data['passwordlama'];
			$passwordbaru = $post_data['passwordbaru'];
			$cekpass = $this->login_model->checkOldPass($passwordlama);
			if($cekpass){
				$savenewpass = $this->login_model->saveNewPass($passwordbaru);
				if($savenewpass){
					redirect('ubahpass/change','refresh');
				}
			}else{
				redirect('ubahpass','refresh');
			}

		}
	}

	/* End of file ubahpass.php */
/* Location: ./application/controllers/ubahpass.php */