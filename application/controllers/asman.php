 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asman extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('tahun_ajaran_model');
		$this->load->model('asman_model');
		$this->load->model('matakuliah_model');
	}

	public function index()
	{
		
	}

	public function daftar() {
		if ($post_data = $this->input->post()) {
			$this->_daftar_submit($post_data);
			return;
		}

	    $session_data = $this->session->userdata('logged_in');
		if ($this->asman_model->check_daftar($session_data['id'], $this->tahun_ajaran_model->get_aktif()->id)) {
			redirect('home');
		}

	    $data['nama'] = $session_data['nama'];
	    $content_data = array(
	      'matakuliah'  => $this->matakuliah_model->get_all(),
	      'nama'		=> $session_data['nama']
	    );
	    $this->load->view('header',$data);
	    $this->load->view('sidebar_mhs');
	    $this->load->view('content_asman_mhs', $content_data);
	    $this->load->view('footer');
	}

	private function _daftar_submit($post_data) {
		$session_user = $this->session->userdata('logged_in');
		$data_asman = array(
			'user_id'		=> $session_user['id'],
			'ipk'			=> $post_data['ipk'],
			'tahun_ajaran'	=> $this->tahun_ajaran_model->get_aktif()->id,
			'matakuliah'	=> array()
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