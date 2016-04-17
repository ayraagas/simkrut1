<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function add_user()
	{
		$data=array(
			'nim'=>$this->input->post('nim'),
			'nama'=>$this->input->post('namalengkap'),
			'password'=>md5($this->input->post('password')),
			'status'=>$this->input->post('status')
			);
		$this->db->insert('mahasiswa',$data);
		return true;
	}
}