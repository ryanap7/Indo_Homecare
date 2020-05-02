<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientController extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');	
		}
	}
	
	public function index()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Client"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM client")->result();
			$this->load->view('pages/Admin/client/index.php', $data);
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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Client"
			);
			$this->load->view('pages/Admin/client/add', $data);
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
		$name              		= $this->input->post('name');
		$nik  	            	= $this->input->post('nik');
		$email              	= $this->input->post('email');
		$phone              	= $this->input->post('telp');
		$alamat              	= $this->input->post('alamat');
		$status              	= $this->input->post('status');
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		$data= array(
			'nama'			=> $name,
			'nik'			=> $nik,
			'email'			=> $email,
			'phone'			=> $phone,
			'alamat'		=> $alamat,
			'status'		=> $status
		);
	
		$this->db->insert('client', $data);
		redirect('admin/client');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Client"
			);
			$where = array('id_client' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM client WHERE id_client='$id'")->result();
			$this->load->view('pages/Admin/client/edit', $data);
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
		$id						= $this->input->post('id');
		$name              		= $this->input->post('name');
		$nik  	            	= $this->input->post('nik');
		$email              	= $this->input->post('email');
		$phone              	= $this->input->post('telp');
		$alamat              	= $this->input->post('alamat');
		$status              	= $this->input->post('status');
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		$data= array(
			'nama'			=> $name,
			'nik'			=> $nik,
			'email'			=> $email,
			'phone'			=> $phone,
			'alamat'		=> $alamat,
			'status'		=> $status
		);

		$where = array('id_client' => $id);
		$this->db->update('client', $data, $where);
		redirect('admin/client'); 
	}

	public function delete($id)
    {
		$where = array('id_client' => $id);
		$this->db->delete('client', $where);
		redirect('admin/client');     
    }
}
