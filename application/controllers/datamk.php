<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('matakuliah_model');
	}

	public function index()
	{if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$data['nama'] = $session_data['username'];

		$content_data = array(
			'matakuliah'  => $this->matakuliah_model->get_all()
			);
		$this->load->view('header',$data);
		$this->load->view('sidebar_adm');
		$this->load->view('content_mk', $content_data);
		$this->load->view('footer');}else{
			redirect('login','refresh');
		}

	}


	public function tambah() {

		$data_mk = array(
			'nama'		=> $this->input->post('nama'),
			'semester'	=> $this->input->post('semester'),
			'jenis'		=> $this->input->post('jenis')
			);
		$this->matakuliah_model->tambah($data_mk);

		redirect('datamk','refresh');
	}

	public function delete() {
		$id= $this->input->get('id');
		$this->matakuliah_model->delete_mk($id);
		if ($this->db->_error_number() == 1451)
		{

			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];

			$content_data = array(
				'matakuliah'  => $this->matakuliah_model->get_all()
				);
			$this->load->view('header',$data);
			$this->load->view('sweetalert/alertdelete');
			$this->load->view('sidebar_adm');
			$this->load->view('content_mk', $content_data);
			$this->load->view('footer');
		} else{
			redirect('datamk','refresh');
		}
	}

	public function delete_all()
	{
		$this->matakuliah_model->delete_mk_all();
		if ($this->db->_error_number() == 1451 AND $this->session->userdata('logged_in'))
		{

			$session_data = $this->session->userdata('logged_in');
			$data['nama'] = $session_data['username'];

			$content_data = array(
				'matakuliah'  => $this->matakuliah_model->get_all()
				);
			$this->load->view('header',$data);
			$this->load->view('sweetalert/alertdelete');
			$this->load->view('sidebar_adm');
			$this->load->view('content_mk', $content_data);
			$this->load->view('footer');
		} else{
			redirect('datamk','refresh');
		}
	}


	public function importcsv() {
		$data['error'] = '';    //initialize image upload error array to empty

		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '1000';

		$this->load->library('upload', $config);


// If upload failed, display error
		if (!$this->upload->do_upload()) {
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');

				$content_data = array(
					'matakuliah'  => $this->matakuliah_model->get_all(),
					'nama'		=> $session_data['username'],
					'error' => $this->upload->display_errors()
					);

				$this->load->view('header',$content_data);
				$this->load->view('sidebar_adm');
				$this->load->view('content_mk',$content_data);
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
							'nama'=>$row['nama'],
							'semester'=>$row['semester'],
							'jenis'=>$row['jenis']
							);
						$this->matakuliah_model->insert_csv($insert_data);
					}
					$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
					redirect('datamk');
        // echo "<pre>"; print_r($insert_data);
				} else {
					if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');

						$content_data = array(
							'matakuliah'  => $this->matakuliah_model->get_all(),
							'nama'		=> $session_data['username'],
							'error'  => "Error occured"
							);

						$this->load->view('header',$content_data);
						$this->load->view('sidebar_adm');
						$this->load->view('content_mk',$content_data);
						$this->load->view('footer');}else{
							redirect('login','refresh');
						}
					}

				} 

			}
		}

		/* End of file datamk.php */
/* Location: ./application/controllers/datamk.php */