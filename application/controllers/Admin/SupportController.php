<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupportController extends CI_Controller
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
			$data['admin']	 	= $this->db->query("SELECT * FROM penunjang_medis")->result();
			$this->load->view('pages/Admin/support/index.php', $data);
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
			$this->load->view('pages/Admin/support/add', $data);
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
		$sesi              		= $this->input->post('sesi');
		$desc              		= $this->input->post('desc');
		$harga 	            	= $this->input->post('harga');
		
		$data= array(
			'name'			=> $name,
			'sesi'			=> $sesi,
			'desc'			=> $desc,
			'harga'			=> $harga
		);
	
		$this->db->insert('penunjang_medis', $data);
		redirect('admin/service/support');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Layanan"
			);
			$where = array('id_penujang' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM penunjang_medis WHERE id_penunjang='$id'")->result();
			$this->load->view('pages/Admin/support/edit', $data);
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
		$sesi              		= $this->input->post('sesi');
		$desc              		= $this->input->post('desc');
		$harga 	            	= $this->input->post('harga');
		
		$data= array(
			'name'			=> $name,
			'sesi'			=> $sesi,
			'desc'			=> $desc,
			'harga'			=> $harga
		);

		$where = array('id_penunjang' => $id);
		$this->db->update('penunjang_medis', $data, $where);
		redirect('admin/service/support'); 
	}

	public function delete($id)
    {
		$where = array('id_penunjang' => $id);
		$this->db->delete('penunjang_medis', $where);
		redirect('admin/service/support');     
    }
}
