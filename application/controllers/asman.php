 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Asman extends CI_Controller {

 	public function __construct() {
 		parent::__construct();

 		$this->load->model('tahunajaran_model');
 		$this->load->model('asman_model');
 		$this->load->model('matakuliah_model');

 	}

 	public function index()
 	{	if($this->session->userdata('logged_in_mhs')){
 		$session_data = $this->session->userdata('logged_in_mhs');

 		$id_mhs 	  =  $session_data['id'];
 		$chk_thn 	  =	 $this->asman_model->check_tahun();

 		$content_data = array(
 			'matakuliah'  => $this->matakuliah_model->get_all(),
 			'tahunajaran' => $this->tahunajaran_model->get_aktif(),
 			'nama'		=> $session_data['nama']
 			);

 		if ($chk_thn == '0') {
 			$this->load->view('header',$content_data);
 			$this->load->view('sidebar_mhs');
 			$this->load->view('content_asman_mhs_nonaktif');
 			$this->load->view('footer');
 		} elseif($this->asman_model->check_daftar($session_data['id'], $this->tahunajaran_model->get_aktif()->id))
 		{

 			$this->load->view('header',$content_data);
 			$this->load->view('sidebar_mhs');
 			$this->load->view('content_asman_mhs_done');
 			$this->load->view('footer');
 		}else{

 			$this->load->view('header',$content_data);
 			$this->load->view('sidebar_mhs');
 			$this->load->view('content_asman_mhs',$content_data);
 			$this->load->view('footer');}

 		}else{
 			   redirect('login','refresh');
 		}

 	}

 	public function daftar() {
 		if ($post_data = $this->input->post()) {
 			$this->_daftar_submit($post_data);
 			return;
 		}
 		redirect('asman','refresh');

 	}

 	private function _daftar_submit($post_data) {
 		$session_data = $this->session->userdata('logged_in_mhs');
 		$data_asman = array(
 			'user_id'		=> $session_data['id'],
 			'ipk'			=> $post_data['ipk'],
 			'tahun_ajaran'	=> $this->tahunajaran_model->get_aktif()->id,
 			'matakuliah'	=> array(),
 			'tipe'			=> $post_data['tipe']
 			);
 		foreach ($post_data['matakuliah'] as $mk_id => $nilai) {
 			if (!empty($nilai)) {
 				$data_asman['matakuliah'][$mk_id] = $nilai;
 			}
 		}
 		$this->asman_model->daftar($data_asman);

 		redirect('asman/daftar','refresh');
 	}


 }

 /* End of file asman.php */
/* Location: ./application/controllers/asman.php */