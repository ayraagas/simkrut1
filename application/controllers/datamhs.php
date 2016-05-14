<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamhs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	//Do your magic here
		$this->load->model('mhs_model');
	}
	public function index()
	{
		$session_data = $this->session->userdata('logged_in');

		$content_data = array(
			'mahasiswa'  => $this->mhs_model->get_all(),
			'nama'		=> $session_data['username']
			);

		$this->load->view('header',$content_data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_datamhs',$content_data);
		$this->load->view('footer');
	}

	public function change()
	{
			
			$id= $this->input->post('id');
			$status = $this->input->post('status');
			if ($status == 0) {
				$data = array(
				'status' => '1'
				);
			} else {
				$data = array(
				'status' => '0'
				);
			}
			$this->mhs_model->change_status($id,$data);

			
			redirect('datamhs','refresh');
	}

}

/* End of file datamhs.php */
/* Location: ./application/controllers/datamhs.php */