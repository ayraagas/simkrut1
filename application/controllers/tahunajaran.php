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
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];

			$content_data = array(
				'tahunajaran'  => $this->tahunajaran_model->get_all()
				);
			$this->load->view('header',$data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_th_ajaran', $content_data);
			$this->load->view('footer');
		}else{
			redirect('login','refresh');
		}
		
	}

	public function change()
	{

		$id= $this->input->get('id');
		$status = $this->input->get('status');
		if ($status == 0) {
			$data = array(
				'status' => '1'
				);
		} else {
			$data = array(
				'status' => '0'
				);
		}
		$data1 = array(
			'status' => '0'
			);
		
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

	public function delete() {
		$id= $this->input->get('id');
		$this->tahunajaran_model->delete_thn($id);
		

		if ($this->db->_error_number() == 1451)
		{


			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];

			$content_data = array(
				'tahunajaran'  => $this->tahunajaran_model->get_all()
				);
			$this->load->view('header',$data);
			$this->load->view('sweetalert/alertdelete');
			$this->load->view('sidebar_adm');
			$this->load->view('content_th_ajaran', $content_data);
			$this->load->view('footer');
		}else{
			redirect('tahunajaran','refresh');
		}
	}

}

/* End of file tahunajaran.php */
/* Location: ./application/controllers/tahunajaran.php */