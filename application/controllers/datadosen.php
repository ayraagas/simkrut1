	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Datadosen extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
		//Do your magic here
			$this->load->model('dosen_model');
			$this->load->library('csvreader');
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

		function readExcel()
		{
			
	    $result =   $this->csvreader->parse_file('Test.csv');//path to csv file

	    $data['csvData'] =  $result;
	    $this->load->view('view_csv', $data);  
	}

	public function tambah_csv(){
		
		

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