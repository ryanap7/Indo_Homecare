<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServiceController extends CI_Controller
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
			$data['admin']	 	= $this->db->query("SELECT * FROM jasa_medis INNER JOIN category ON jasa_medis.id_category = category.id_category ORDER BY name DESC")->result();
			$this->load->view('pages/Admin/service/index.php', $data);
		} else {
			redirect('/');		
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Layanan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM category")->result();
			$this->load->view('pages/Admin/service/add', $data);
		} else {
			redirect('/');		
		}
	}

	public function store()
    {
		$name              		= $this->input->post('name');
		$category              	= $this->input->post('category');
		$desc              		= $this->input->post('desc');
		$period              	= $this->input->post('period');
		$bulan              	= $this->input->post('bulan');

		
		$data= array(
			'name'			=> $name,
			'id_category'	=> $category,
			'desc'			=> $desc,
			'sesi'			=> $period,
			'harga'			=> $bulan
		);
	
		$this->db->insert('jasa_medis', $data);
		redirect('admin/service');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Layanan"
			);
			$where = array('id_jasa' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM jasa_medis WHERE id_jasa='$id'")->result();
			$this->load->view('pages/Admin/service/edit', $data);
		} else {
			redirect('/');		
		}
	}

	public function update()
    {
		$id						= $this->input->post('id');
		$name              		= $this->input->post('name');
		$category              	= $this->input->post('category');
		$desc              		= $this->input->post('desc');
		$period              	= $this->input->post('period');
		$bulan              	= $this->input->post('bulan');
		
		$data= array(
			'name'			=> $name,
			'id_category'	=> $category,
			'desc'			=> $desc,
			'sesi'			=> $period,
			'harga'			=> $bulan
		);

		$where = array('id_jasa' => $id);
		$this->db->update('jasa_medis', $data, $where);
		redirect('admin/service'); 
	}

	public function delete($id)
    {
		$where = array('id_jasa' => $id);
		$this->db->delete('jasa_medis', $where);
		redirect('admin/service');     
    }
}
