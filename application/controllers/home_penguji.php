<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_penguji extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penguji_model');
		$this->load->model('asprak_model');
		$this->load->model('kriteria_model');
		$this->load->model('tahunajaran_model');
		//Do your magic here
	}

	public function index()
	{
		if($this->session->userdata('logged_in_pgj')){
			$session_data = $this->session->userdata('logged_in_pgj');
			$chk_thn 	  =	 $this->asprak_model->check_tahun();
			$id_penguji = $session_data['id'];
		// var_dump($id_penguji);exit;

			$content_data = array(
				'subkriteria' => $this->penguji_model->get_subkriteria($id_penguji),
				'kriteria' => $this->penguji_model->get_kriteria($id_penguji),
				'nama'		=> $session_data['username'],
				'tahunajaran' => $this->tahunajaran_model->get_aktif(),
				'matakuliah' => $this->asprak_model->matakuliah(),
				'alternatif' => $this->asprak_model->get_data_alternatif_null_nilai()
				);

			$dataNilaiSub =[];

			foreach ($this->penguji_model->get_data_nilai_sub_alternatif($id_penguji) as $subalt) {
				$dataNilaiSub[$subalt->nama_alt]['id']=$subalt->id;
				$dataNilaiSub[$subalt->nama_alt]['nilai'][$subalt->nama_sub]=$subalt->nilai;
			}
			$content_data['dataNilaiSub'] = $dataNilaiSub;

			$dataNilaiKri =[];
			foreach ($this->penguji_model->get_data_nilai_kri_alternatif($id_penguji) as $kri) {
				$dataNilaiKri[$kri->nama_alt]['id']=$kri->id;
				$dataNilaiKri[$kri->nama_alt]['nilai'][$kri->nama_kri]=$kri->nilai;
				$dataNilaiKri[$kri->nama_alt]['id_kri']=$kri->id_kri;
			}
			$content_data['dataNilaiKri'] = $dataNilaiKri;

			if ($chk_thn == '0') {
				$this->load->view('header',$content_data);
				$this->load->view('sidebar_pgj');
				$this->load->view('content_asprak_pgj_nonaktif');
				$this->load->view('footer');
			}else{
				$this->load->view('header',$content_data);
				$this->load->view('sidebar_pgj');
				$this->load->view('content_dash_pgj',$content_data);
				$this->load->view('footer');
			}}else{
				redirect('login','refresh');
			}
		}


		public function ubahnilai(){
			$id= $this->input->get('id');


			if($this->session->userdata('logged_in_pgj')){
				$session_data = $this->session->userdata('logged_in_pgj');

				$chk_thn 	  =	 $this->asprak_model->check_tahun();
				$id_penguji = $session_data['id'];

				$content_data = array(
					'subkriteria' => $this->penguji_model->get_subkriteria($id_penguji),
					'kriteria' => $this->penguji_model->get_kriteria($id_penguji),
					'nama'		=> $session_data['username'],
					'tahunajaran' => $this->tahunajaran_model->get_aktif(),
					'nama_alternatif' => $nama_alt= $this->input->get('nama'),
					'id_alternatif' => $id= $this->input->get('id')
					);

				$dataNilaiKri =[];
				foreach ($this->penguji_model->ubahnilaikriteria($id,$id_penguji) as $kri) {
					$dataNilaiKri[$kri->nama_kri]['nilai']=$kri->nilai;
					$dataNilaiKri[$kri->nama_kri]['id_kri']=$kri->id_kri;
				}
				$content_data['dataNilaiKri'] = $dataNilaiKri;

				$dataNilaiSub =[];
				foreach ($this->penguji_model->ubahnilaisubkriteria($id,$id_penguji) as $sub) {
					$dataNilaiSub[$sub->nama_kri]['nilai']=$sub->nilai;
					$dataNilaiSub[$sub->nama_kri]['id_kri']=$sub->id_kri;
				}
				$content_data['dataNilaiSub'] = $dataNilaiSub;

				if ($chk_thn == '0') {
					$this->load->view('header',$content_data);
					$this->load->view('sidebar_pgj');
					$this->load->view('content_asprak_pgj_nonaktif');
					$this->load->view('footer');
				}else{

					$this->load->view('header',$content_data);
					$this->load->view('sidebar_pgj');
					$this->load->view('content_penguji_nilai_ubah',$content_data);
					$this->load->view('footer');
					// var_dump($id_penguji);exit;
				}}else{
					redirect('login','refresh');
				}

				if ($post_data = $this->input->post()) {
					$this->_ubahnilai_submit($post_data);
					return;
				}
			}

			private function _ubahnilai_submit($post_data) {
				$session_data = $this->session->userdata('logged_in_pgj');
				$id_penguji = $session_data['id'];
				$data_nilai_kri = array(
					'id_penguji'	=> $id_penguji,
					'alternatif'	=> $post_data['id_alt'],
					'kriteria'	=> array()
					);
				if (isset($post_data['kriteria'])) {
					foreach ($post_data['kriteria'] as $k_id => $nilai) {
						if (!empty($nilai)) {
							$data_nilai_kri['kriteria'][$k_id] = $nilai;
						}
					}
					$this->penguji_model->tambahnilaikri($data_nilai_kri);
				}

/////////////////////////////////////////////////////////////////////////////
				$data_nilai_sub = array(
					'id_penguji'	=> $id_penguji,
					'alternatif'	=> $post_data['id_alt'],
					'subkriteria'	=> array()
					);
				if (isset($post_data['subkriteria'])) {
					foreach ($post_data['subkriteria'] as $sk_id => $nilai) {
						if (!empty($nilai)) {
							$data_nilai_sub['subkriteria'][$sk_id] = $nilai;
						}
					}
					$this->penguji_model->tambahnilaisub($data_nilai_sub);
				}

				$this->penguji_model->masuknilai();

				redirect('home_penguji','refresh');
			}

		}

		/* End of file home_admin.php */
/* Location: ./application/controllers/home_admin.php */