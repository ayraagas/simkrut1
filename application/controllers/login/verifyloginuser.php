<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLoginUser extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('login/login_model','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('nim', 'Nim', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $this->load->view('loginUser');
    $this->load->view('sweetalert/alertlogin');
   }
   else
   {
     //Go to private area
    
     redirect('home', 'refresh');
   }

 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $nim = $this->input->post('nim');

   //query the database
   $result = $this->login_model->loginuser($nim, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       
       $sess_array = array(
         'id'  => $row->id,
         'nim' => $row->nim,
         'nama'=> $row->nama
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database');
     return false;
   }
 }
}
?>