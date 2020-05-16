<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SewaAmbulanceController extends CI_Controller
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
			$data['client']	 	= $this->db->query("SELECT * FROM client")->result();
			$data['admin']	 	= $this->db->query("SELECT * FROM ambulance")->result();
			$this->load->view('pages/Admin/ambulance/sewa.php', $data);
		} else {
			redirect('/');	
		}
	}

	public function store()
    {
		$client              		= $this->input->post('client');
		$name              		= $this->input->post('name');
		$harga					= $this->input->post('harga');
		
		$data= array(
			'id_client'			=> $client,
			'id_ambulance'		=> $name,
			'harga'				=> $harga,
			'status_peminjaman'	=> 0,
			'date'				=> date('Y-m-d')	
		);
	
		$this->db->insert('sewa_ambulance', $data);

		$data= array(
			'status'			=> 0
		);

		$where = array('id_ambulance' => $name);
		$this->db->update('ambulance', $data, $where);

		redirect('admin/ambulance/sewa/history');
	}


	public function update($id)
    {

		$data= array(
			'status_peminjaman'			=> 1
		);

		$where = array('id_ambulance' => $id);
		$this->db->update('sewa_ambulance', $data, $where);

		$data= array(
			'status'			=> 1
		);

		$where = array('id_ambulance' => $id);
		$this->db->update('ambulance', $data, $where);
		redirect('admin/ambulance/sewa/history'); 
	}

	public function delete($id)
    {
		$where = array('id_sewa' => $id);
		$this->db->delete('sewa_ambulance', $where);
		redirect('admin/ambulance/sewa/history');     
    }

	public function history()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Ambulance"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM client 
													INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client 
													INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance")->result();
			$this->load->view('pages/Admin/ambulance/history.php', $data);
		} else {
			redirect('/');		
		}
	}
}
