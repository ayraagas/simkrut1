<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{	
		if($this->session->userdata('logged_in_mhs')){
			redirect('home','refresh');
		} else {
			$this->load->helper(array('form'));
			$this->load->view('loginUser');
		}

	}
	function admin()
	{	

		if($this->session->userdata('logged_in')){
			redirect('home','refresh');
		} else {
			$this->load->helper(array('form'));
			$this->load->view('loginAdmin');
		}

	}

}

?>