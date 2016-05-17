<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunajaran extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('tahunajaran_model');
}
	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['nama'] = $session_data['username'];

		 $content_data = array(
	      'tahunajaran'  => $this->tahunajaran_model->get_all()
	    );
		$this->load->view('header',$data);
	    $this->load->view('sidebar_adm');
	    $this->load->view('content_th_ajaran', $content_data);
	    $this->load->view('footer');
	}

	public function change()
	{
			
			$id= $this->input->post('id');
			$status = $this->input->post('status');
			$data1 = array(
				'status' => '0'
				);
			if ($status == 0) {
				$data = array(
				'status' => '1'
				);
			} else {
				$data = array(
				'status' => '0'
				);
			}
			$this->tahunajaran_model->change_status($id,$data,$data1);

			
			redirect('tahunajaran','refresh');
	}

		public function tambah() {

		$data_thajaran = array(
			'tahun'		=> $this->input->post('tahun'),
			'semester'	=> $this->input->post('semester')
		);
		$this->tahunajaran_model->tambah($data_thajaran);

		redirect('tahunajaran','refresh');
	}



}

/* End of file tahunajaran.php */
/* Location: ./application/controllers/tahunajaran.php */