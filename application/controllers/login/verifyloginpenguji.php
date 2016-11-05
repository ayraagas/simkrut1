<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLoginPenguji extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('login/login_model','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $this->load->view('loginPenguji');
    $this->load->view('sweetalert/alertlogin_admin');
   }
   else
   {
     //Go to private area
     redirect('home_penguji', 'refresh');
    }
    }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->login_model->loginPenguji($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
        'id'=> $row->id,
         'username' => $row->nama
         );
       $this->session->set_userdata('logged_in_pgj', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database');
     return false;
   }
 }}
?>