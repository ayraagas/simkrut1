<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
	public function do_register()
	{
		if($this->input->post('register'))//$_POST["register"];
		{
			$this->load->model('registerUser/register_model');//loads the user_model.php file in models folder
			if($this->register_model->add_user())
			{	
				redirect('login', 'refresh');
			}
			else
			{
				echo "Registration failed";
				redirect('login', 'refresh');
			}
		}
	}

	public function check_nim() {
		$nim = $this->input->get("nim");
		$this->db->where("nim", $nim);
		$check = $this->db->count_all_results("mahasiswa");
		echo json_encode($check == 0);
	}
}