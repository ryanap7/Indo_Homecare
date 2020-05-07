<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranController extends CI_Controller
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
				'title' => "Transaksi Pengeluaran"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pengeluaran")->result();
			$this->load->view('pages/Admin/pengeluaran/index.php', $data);
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
				'title' => "Transaksi Pengeluaran"
			);
			$this->load->view('pages/Admin/pengeluaran/add', $data);
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
		$desc              		= $this->input->post('desc');
		$nominal  	            = $this->input->post('nominal');
		$date  	            	= $this->input->post('date');

		$data= array(
			'desc'			=> $desc,
			'nominal'		=> $nominal,
			'date'			=> $date			
		);
	
		$this->db->insert('pengeluaran', $data);
		redirect('admin/pengeluaran');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Transaksi Pengeluaran"
			);
			$where = array('id_pengeluaran' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM pengeluaran WHERE id_pengeluaran='$id'")->result();
			$this->load->view('pages/Admin/pengeluaran/edit', $data);
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
		$desc              		= $this->input->post('desc');
		$nominal  	           	= $this->input->post('nominal');
		$date  	           		= $this->input->post('date');

		$data= array(
			'desc'			=> $desc,
			'nominal'		=> $nominal,
			'date'			=> $date
		);

		$where = array('id_pengeluaran' => $id);
		$this->db->update('pengeluaran', $data, $where);
		redirect('admin/pengeluaran'); 
	}

	public function delete($id)
    {
		$where = array('id_pengeluaran' => $id);
		$this->db->delete('pengeluaran', $where);
		redirect('admin/pengeluaran');     
    }
}
