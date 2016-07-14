<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadosen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//Do your magic here
		$this->load->model('dosen_model');
		$this->load->library('csvimport');
	// $this->load->spark('csvimport/0.0.1');

	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');

			$content_data = array(
				'dosen'  => $this->dosen_model->get_all(),
				'nama'		=> $session_data['username']
				);

			$this->load->view('header',$content_data);
			$this->load->view('sidebar_adm');
			$this->load->view('content_dosen',$content_data);
			$this->load->view('footer');}else{
				redirect('login','refresh');
			}

		}

		public function tambah() {

			$data_dosen = array(
				'nama'		=> $this->input->post('nama')
				);
			$this->dosen_model->tambah($data_dosen);

			redirect('datadosen','refresh');
		}
		public function delete() {
			$id= $this->input->get('id');
			$this->dosen_model->delete_dosen($id);

			if ($this->db->_error_number() == 1451)
			{
				$session_data = $this->session->userdata('logged_in');

				$content_data = array(
					'dosen'  => $this->dosen_model->get_all(),
					'nama'		=> $session_data['username']
					);

				$this->load->view('header',$content_data);
				$this->load->view('sweetalert/alertdelete');
				$this->load->view('sidebar_adm');
				$this->load->view('content_dosen',$content_data);
				$this->load->view('footer');
			}else{
				redirect('datadosen','refresh');
			}
		}

		public function importcsv() {
		$data['error'] = '';    //initialize image upload error array to empty

		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '1000';

		$this->load->library('upload', $config);


// If upload failed, display error
		if (!$this->upload->do_upload()) {
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');

				$content_data = array(
					'dosen'  => $this->dosen_model->get_all(),
					'nama'		=> $session_data['username'],
					'error' => $this->upload->display_errors()
					);

				$this->load->view('header',$content_data);
				$this->load->view('sidebar_adm');
				$this->load->view('content_dosen',$content_data);
				$this->load->view('footer');}else{
					redirect('login','refresh');
				}
			} else {
				$file_data = $this->upload->data();
				$file_path =  'assets/uploads/'.$file_data['file_name'];

				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);
					foreach ($csv_array as $row) {
						$insert_data = array(
							'nama'=>$row['nama']
							);
						$this->dosen_model->insert_csv($insert_data);
					}
					$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
					redirect('datadosen');
        // echo "<pre>"; print_r($insert_data);
				} else {
					if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');

						$content_data = array(
							'dosen'  => $this->dosen_model->get_all(),
							'nama'		=> $session_data['username'],
							'error'  => "Error occured"
							);

						$this->load->view('header',$content_data);
						$this->load->view('sidebar_adm');
						$this->load->view('content_dosen',$content_data);
						$this->load->view('footer');}else{
							redirect('login','refresh');
						}
					}

				} 

			}
		}

		/* End of file datadosen.php */
/* Location: ./application/controllers/datadosen.php */