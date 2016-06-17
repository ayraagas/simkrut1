<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasubkriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subkriteria_model');
		//Do your magic here
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_kriteria=$this->input->get('id');
			$content_data = array(
				'nama'		=> $session_data['username'],
				'subkriteria'  => $this->subkriteria_model->get_all($id_kriteria),
				'id_kriteria' => $id_kriteria
				);

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_subkriteria',$content_data);
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

		$data_subkriteria = array(
			'nama'		=> $post_data['nama'],
			'bobot'		=> $post_data['bobot'],
			'kategori'	=> $post_data['kategori'],
			'id_kriteria' => $post_data['id_kriteria']
			);
		$this->subkriteria_model->tambah($data_subkriteria);
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
		$data_subkriteria = array(
			'nama'		=> $post_data['nama'],
			'bobot'		=> $post_data['bobot'],
			'kategori'	=> $post_data['kategori']
			);
		$this->subkriteria_model->ubah($id,$data_subkriteria);
		redirect('datakriteria','refresh');
	}

	public function delete(){
		$id= $this->input->get('id');
		$this->subkriteria_model->delete($id);
		redirect('datakriteria','refresh');
	}

}

/* End of file datasubkriteria.php */
/* Location: ./application/controllers/datasubkriteria.php */