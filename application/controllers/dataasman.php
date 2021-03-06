<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataasman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('asman_model');
		$this->load->model('tahunajaran_model');
		$this->load->model('dosen_model');
//Do your magic here
	}

	public function index(){
		redirect('dataasman/pendaftar','refresh');
	}

	public function pendaftar(){
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');

			$chk_thn 	  =	 $this->asman_model->check_tahun();

			$content_data = array(
				'asisten_mandiri'  => $this->asman_model->get_data_asman(),
				'nama'		=> $session_data['username'],
				'tahunajaran' => $this->tahunajaran_model->get_aktif(),
				'dosen' => $this->dosen_model->get_all_daftar()
				);

			if ($chk_thn == '0') {
				$this->load->view('header',$content_data);
				$this->load->view('sidebar_adm');
				$this->load->view('content_asman_adm_nonaktif');
				$this->load->view('footer');
			}else{

				$this->load->view('header',$content_data);
				$this->load->view('sidebar_adm');
				$this->load->view('content_asman_adm',$content_data);
				$this->load->view('footer');
			}}else{
				redirect('login','refresh');
			}
		}

		public function importcsv(){

				$this->asman_model->importExcel();
				redirect('dataasman/pendaftar','refresh');

		}

		public function simpanExcel(){
			if($this->session->userdata('logged_in')){

				$session_data = $this->session->userdata('logged_in');

				$chk_thn 	  =	 $this->asman_model->check_tahun();

				$content_data = array(
					'asisten_mandiri'  => $this->asman_model->get_data_asman_1(),
					'nama'		=> $session_data['username'],
					'tahunajaran' => $this->tahunajaran_model->get_aktif(),
					'dosen' => $this->dosen_model->get_all_daftar()
					);

				if ($chk_thn == '0') {
					$this->load->view('header',$content_data);
					$this->load->view('sidebar_adm');
					$this->load->view('content_asman_adm_nonaktif');
					$this->load->view('footer');
				}else{

					$this->load->view('header',$content_data);
					$this->load->view('sidebar_adm');
					$this->load->view('content_asman_adm_1',$content_data);
					$this->load->view('footer');
				}}else{
					redirect('login','refresh');
				}	
			}

			public function simpanExcel_submit(){
				$query['data_asman'] = $this->asman_model->get_data_asman_1(); 
				$this->load->view('content_asman_adm_export',$query);

			}

			public function terima() {
				if ($post_data = $this->input->post()) {
					$this->_terima_submit($post_data);
					return;
				}
				redirect('dataasman','refresh');

			}

			private function _terima_submit($post_data){

				$session_data = $this->session->userdata('logged_in');

				$data_asman = array(
					'id_asisten'		=> $post_data['id_asisten'],
					'id_dosen'			=> $post_data['dosen'],
					'kelas'				=> $post_data['kelas']
					);

				$this->asman_model->terima($data_asman);
				redirect('dataasman','refresh');
			}

		}

		/* End of file data.php */
/* Location: ./application/controllers/data.php */