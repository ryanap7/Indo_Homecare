<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');	
		}
  	}

	public function index() {
		if ($this->session->userdata('logged_in') !== TRUE) {
			$data = array(
				'title' => "Login Administator"
			);
			$this->load->view('auth/index', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function login()	
	{
		$pin 		= $this->input->post('pin');
		$result		= $this->db->query("SELECT * FROM GYM_TBL_AUTH WHERE PIN='$pin'");

		if(count($result->num_rows()) > 0)
		{
			$data		= $result->row_array();
			$id			= $data['ID'];
			$name		= $data['NAME'];
			$pin		= $data['PIN'];
			$img		= $data['IMG'];
			$sesdata	= array(
				'ID'		=> $id,
				'NAME'		=> $name,
				'IMG'		=> $img,
				'logged_in'	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			redirect('admin/dashboard');
		} else {
		echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";		
		}
		$this->load->view('auth/index', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
