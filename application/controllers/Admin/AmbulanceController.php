<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AmbulanceController extends CI_Controller
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
				'title' => "Data Ambulance"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM ambulance")->result();
			$this->load->view('pages/Admin/ambulance/index.php', $data);
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
				'title' => "Data Ambulance"
			);
			$this->load->view('pages/Admin/ambulance/add', $data);
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
		
		$data= array(
			'name'			=> $name,
			'status'			=> 1
		);
	
		$this->db->insert('ambulance', $data);
		redirect('admin/ambulance');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Ambulance"
			);
			$where = array('id_ambulance' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM ambulance WHERE id_ambulance='$id'")->result();
			$this->load->view('pages/Admin/ambulance/edit', $data);
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
		
		$data= array(
			'name'			=> $name
		);

		$where = array('id_ambulance' => $id);
		$this->db->update('ambulance', $data, $where);
		redirect('admin/ambulance'); 
	}

	public function delete($id)
    {
		$where = array('id_ambulance' => $id);
		$this->db->delete('ambulance', $where);
		redirect('admin/ambulance');     
    }
}
