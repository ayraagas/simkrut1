	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Datadosen extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
		//Do your magic here
			$this->load->model('dosen_model');


		}

		public function index()
		{if($this->session->userdata('logged_in')){
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
		public function upload(){

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'text/comma-separated-values|application/csv|application/excel|application/vnd.ms-excel|application/vnd.msexcel|text/anytext';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				// echo "failed";
			}
			else{
				$file_info = $this->upload->data();
				$csvfilepath = "uploads/" . $file_info['file_name'];
				$handle = fopen($csvfilepath, "r");

				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$import="INSERT INTO dosen (nama) VALUES('$data[0]')";

					mysql_query($import) or die(mysql_error());
				}

				fclose($handle);
				echo "success";
			}


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
	}

	/* End of file datadosen.php */
	/* Location: ./application/controllers/datadosen.php */