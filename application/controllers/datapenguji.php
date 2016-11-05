<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenguji extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('penguji_model');
		//Do your magic here
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');

			$content_data = array(
				'penguji'  => $this->penguji_model->get_all_penguji(),
				'nama'		=> $session_data['username']
				);

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_penguji',$content_data);
			$this->load->view('footer');}else{
				redirect('login','refresh');
			}
		}


		public function tambah() {

			$data_penguji = array(
				'nama'		=> $this->input->post('nama'),
				'password'	=>md5(1234)
				);
			$this->penguji_model->tambah($data_penguji);

			redirect('datapenguji','refresh');
		}


		public function delete(){

			$id= $this->input->get('id');
			$this->penguji_model->delete_penguji($id);
			redirect('datapenguji','refresh');

		}

		public function penilai(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');

				$content_data = array(
					'penguji'  => $this->penguji_model->get_all_penguji(),
					'kriteria' => $this->penguji_model->get_all_kriteria(),
					'penguji_kriteria'=>$this->penguji_model->get_all_penguji_kriteria(),
					'nama'		=> $session_data['username']
					);

				$this->load->view('header',$content_data);
				$this->load->view('sidebar_adm');
				$this->load->view('content_penilai',$content_data);
				$this->load->view('footer');}else{
					redirect('login','refresh');
				}
			}

			public function tambahpenilai() {

				$data_penilai = array(
					'id_penguji'		=> $this->input->post('penguji'),
					'id_kriteria'	=>$this->input->post('kriteria')
					);
				$this->penguji_model->tambah_penilai($data_penilai);

				redirect('datapenguji/penilai','refresh');
			}

			public function delete_penilai(){

				$id= $this->input->get('id');
				$this->penguji_model->delete_penilai($id);
				redirect('datapenguji/penilai','refresh');

			}


		}

		/* End of file penguji.php */
/* Location: ./application/controllers/penguji.php */