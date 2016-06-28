<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];
			$this->load->view('header',$data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_dash_adm');
			$this->load->view('footer');

		}
		else
		{
     //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}


 // function logout()
 // {
 //   $this->session->unset_userdata('logged_in');
 //   session_destroy();
 //   redirect('login', 'refresh');
 // }

}

/* End of file home_admin.php */
/* Location: ./application/controllers/home_admin.php */