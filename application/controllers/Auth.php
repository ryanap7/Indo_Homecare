<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');	
		}
		$this->load->model('M_Auth');
  	}

	public function index() {
		if ($this->session->userdata('role') === '1') {
			redirect('superadmin/dashboard');
		} elseif ($this->session->userdata('role') === '2') {
			redirect('admin/dashboard');
		} elseif ($this->session->userdata('role') === '3') {
			redirect('koordinator/dashboard');
		} else {
			$data = array(
				'title' => "Login"
			);
			$data['role']	 	= $this->db->query("SELECT * FROM hak_akses")->result();
			$this->load->view('auth/index', $data);
		}
	}

	public function login()	
	{
		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');
		$result			= $this->M_Auth->check_admin($email, $password);

		if($result->num_rows() > 0)
		{
			$data		= $result->row_array();
			$id			= $data['id_auth'];
			$name		= $data['name'];
			$email		= $data['email'];
			$password	= $data['password'];
			$img		= $data['img'];
			$role		= $data['role'];
			$sesdata	= array(
				'id'		=> $id,
				'name'		=> $name,
				'email'		=> $email,
				'img'		=> $img,
				'role'		=> $role,
				'logged_in'	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			if ($role === '1') {
				redirect('superadmin/dashboard');
			} elseif ($role === '2') {
				redirect('admin/dashboard');
			} elseif ($role === '3') {
				redirect('koordinator/dashboard');
			}
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";		
		}
		$data = array(
			'title' => "Login"
		);
		$data['role']	 	= $this->db->query("SELECT * FROM role")->result();
		$this->load->view('auth/index', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
