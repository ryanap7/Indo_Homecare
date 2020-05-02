<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');	
		}
		$this->load->model('M_Admin');
	}
	
	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Admin"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM auth INNER JOIN hak_akses ON auth.role=hak_akses.id_role")->result();
			$this->load->view('pages/SuperAdmin/admin/index.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Admin"
			);
			$data['hak_akses'] = $this->M_Role->get_data()->result();
			$this->load->view('pages/SuperAdmin/admin/add', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function store()
    {
		$name                   = $this->input->post('name');
		$email           		= $this->input->post('email');
		$password               = $this->input->post('password');
		$role					= $this->input->post('role');
		$img 				    = $_FILES['img'];
		if ($img = '') {
			// Jika Field Kosong
			$img = 'default.png';
		} else {
			// Jika Field Ada
			$config['upload_path']		= './assets/img/avatar';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img')){
				$img=$this->upload->data('file_name');
			} else {
				$img = 'default.png';	
			}
		}
		$data= array(
			'name'			=> $name,
			'email'			=> $email,
			'password'		=> sha1($password),
			'img'			=> $img,
			'role'			=> $role
		);
		
		$this->M_Admin->store($data, 'auth');
		redirect('superadmin/admin');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Admin"
			);
			$where = array('id_auth' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM auth WHERE id_auth='$id'")->result();
			$this->load->view('pages/SuperAdmin/admin/edit', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function update()
    {
		$id					= $this->input->post('id');
		$name               = $this->input->post('name');
		$email          	= $this->input->post('email');
		$inputPassword      = $this->input->post('password');
		$role           	= $this->input->post('role');
		$img 				= $_FILES['img'];
		$result				= $this->M_Admin->check_img($id);

		if($result->num_rows() > 0)
		{
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
			$passwordLama		= $data['password'];
		} 
		
		if($inputPassword == ''){
			// Jika Kosong
			$password  			= $passwordLama;
		} else {
			// Jika Ada
			$password           = sha1($inputPassword);
		}

		if ($img){
			// Jika Field ada
			$config['upload_path']		= './assets/img/avatar';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img')){
				$img=$this->upload->data('file_name');
				$this->db->set('img', $img);
				if($foto != 'default.png')
				{
					$target_file	= './assets/img/avatar/'.$foto;
					unlink($target_file);
				}
			} else {
				echo $this->upload->display_errors();
			}
		}
	   
		$data = array(
			'name'				=> $name,
			'email'				=> $email,
			'password'			=> $password,
			'role'				=> $role
		);
		
		$where = array('id_auth' => $id);
		$this->M_Admin->update('auth', $data, $where);
		redirect('superadmin/admin');    
	}

	public function delete($id)
    {
		$result				= $this->M_Admin->check_img($id);

		if($result->num_rows() > 0)
		{
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if($foto != 'default.png')
		{
			$target_file	= './assets/img/avatar/'.$foto;
			unlink($target_file);
		}

		$where = array('id_auth' => $id);
		$this->db->delete('auth', $where);
		redirect('superadmin/admin');     
    }
}
