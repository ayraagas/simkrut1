<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('matakuliah_model');

    //Do your magic here
  }

  public function daftarasman()
  {

    $session_data = $this->session->userdata('logged_in');
    $data['nama'] = $session_data['nama'];
    $content_data = array(
      'matakuliah'  => $this->matakuliah_model->get_all()
    );
    $this->load->view('header',$data);
    $this->load->view('sidebar_mhs');
    $this->load->view('content_asman_mhs', $content_data);
    $this->load->view('footer');
  }

  public function tambahasman()
  {
   if ($this->input->post('submit')) {
        $a  =  $this->input->post('ipk');
        
        $object = array(
            'ipk' => $a
          );
        $query = $this->daftar_asman_model->insert($object);
   }
 }

 public function daftarasprak()
 {

   $session_data = $this->session->userdata('logged_in');
   $data['nama'] = $session_data['nama'];
   $this->load->view('header',$data);
   $this->load->view('sidebar_mhs');
   $this->load->view('content_asprak_mhs');
   $this->load->view('footer');
 }

}

/* End of file daftarasman.php */
/* Location: ./application/controllers/daftarasman.php */