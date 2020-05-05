<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PackageController extends CI_Controller
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
				'title' => "Data Layanan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM paket")->result();
			$this->load->view('pages/Admin/package/index.php', $data);
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
				'title' => "Data Layanan"
			);
			$this->load->view('pages/Admin/package/add', $data);
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
		$desc              		= $this->input->post('desc');
		$harga 	            	= $this->input->post('harga');
		
		$data= array(
			'name'			=> $name,
			'desc'			=> $desc,
			'harga'			=> $harga
		);
	
		$this->db->insert('paket', $data);
		redirect('admin/service/package');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Layanan"
			);
			$where = array('id_paket' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM paket WHERE id_paket='$id'")->result();
			$this->load->view('pages/Admin/package/edit', $data);
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
		$desc              		= $this->input->post('desc');
		$harga 	            	= $this->input->post('harga');
		
		$data= array(
			'name'			=> $name,
			'desc'			=> $desc,
			'harga'			=> $harga
		);

		$where = array('id_paket' => $id);
		$this->db->update('paket', $data, $where);
		redirect('admin/service/package'); 
	}

	public function delete($id)
    {
		$where = array('id_paket' => $id);
		$this->db->delete('paket', $where);
		redirect('admin/service/package');     
    }
}
