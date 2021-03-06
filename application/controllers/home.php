<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   if($this->session->userdata('logged_in_mhs'))
   {
     $session_data = $this->session->userdata('logged_in_mhs');
     $data['nama'] = $session_data['nama'];
     $this->load->view('header_mhs',$data);
     $this->load->view('sidebar_mhs');
     $this->load->view('content_dash_mhs');
     $this->load->view('footer');
      
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in_mhs');
   $this->session->unset_userdata('logged_in');
   $this->session->unset_userdata('logged_in_pgj');
   session_destroy();
   redirect('/', 'refresh');
 }
 
}
 
?>