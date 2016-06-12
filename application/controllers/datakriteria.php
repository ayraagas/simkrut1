<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kriteria_model');
		//Do your magic here
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');

			$content_data = array(
				'nama'		=> $session_data['username'],
				'kriteria'  => $this->kriteria_model->get_all()
				);

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_kriteria',$content_data);
			$this->load->view('footer');
		}else{
			redirect('login','refresh');
		}

	}

	public function tambah(){

		if ($post_data = $this->input->post()) {
			$this->_tambah_submit($post_data);
			return;
		}
		redirect('datakriteria','refresh');
	}

	private function _tambah_submit($post_data){
		$session_data = $this->session->userdata('logged_in');
		$data_kriteria = array(
			'nama'		=> $post_data['nama'],
			'bobot'		=> $post_data['bobot'],
			'kategori'	=> $post_data['kategori']
			);
		$this->kriteria_model->tambah($data_kriteria);
		redirect('datakriteria','refresh');
	}

	public function ubah(){
		if ($post_data = $this->input->post()) {
			$this->_ubah_submit($post_data);
			return;
		}
		redirect('datakriteria','refresh');
	}

	private function _ubah_submit($post_data){
		$session_data = $this->session->userdata('logged_in');
		$id= $post_data['id'];
		$data_kriteria = array(
			'nama'		=> $post_data['nama'],
			'bobot'		=> $post_data['bobot'],
			'kategori'	=> $post_data['kategori']
			);
		$this->kriteria_model->ubah($id,$data_kriteria);
		redirect('datakriteria','refresh');
	}

	public function delete(){
		$id= $this->input->get('id');
		$this->kriteria_model->delete($id);
		redirect('datakriteria','refresh');
	}



	
}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria.php */