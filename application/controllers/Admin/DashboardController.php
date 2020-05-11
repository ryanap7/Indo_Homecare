<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');	
		}
  	}

	public function index() {
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Dashboard"
			);
			$data['client'] = $this->db->query('SELECT * FROM client')->num_rows();
			$data['ambulance'] = $this->db->query('SELECT * FROM sewa_ambulance WHERE status_peminjaman = 1')->num_rows();
			$data['alkes'] 	   = $this->db->query('SELECT * FROM sewa_alkes')->num_rows();
			$data['cancel_alkes'] = $this->db->query('SELECT * FROM sewa_alkes WHERE status = 0')->num_rows();
			$data['pending_alkes'] = $this->db->query('SELECT * FROM sewa_alkes WHERE status = 1')->num_rows();
			$data['success_alkes'] = $this->db->query('SELECT * FROM sewa_alkes WHERE status = 2')->num_rows();
			$data['service'] 	   = $this->db->query('SELECT * FROM transaction')->num_rows();
			$data['cancel_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 0')->num_rows();
			$data['pending_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 1')->num_rows();
			$data['success_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 2')->num_rows();
			$this->load->view('pages/Admin/dashboard/index.php', $data);
		} else {
			redirect('/');	
		}
	}
	
	public function service()
	{
		$data = $this->M_Dashboard->service();
		echo json_encode($data);
	}

	public function alkes()
	{
		$data = $this->M_Dashboard->alkes();
		echo json_encode($data);
	}
	
	public function ambulance()
	{
		$data = $this->M_Dashboard->ambulance();
		echo json_encode($data);
	}
}
