<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function daftarasman()
	{
		
          $session_data = $this->session->userdata('logged_in');
          $this->load->view('header');
          $this->load->view('sidebar_mhs');
          $this->load->view('content_asman_mhs');
          $this->load->view('footer');
     }

     public function daftarasprak()
     {

         $session_data = $this->session->userdata('logged_in');
         $this->load->view('header');
         $this->load->view('sidebar_mhs');
         $this->load->view('content_asprak_mhs');
         $this->load->view('footer');
    }

}

/* End of file daftarasman.php */
/* Location: ./application/controllers/daftarasman.php */