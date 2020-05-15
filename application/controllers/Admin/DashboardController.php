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
			$data['service'] 	   = $this->db->query('SELECT * FROM transaction')->num_rows();
			$data['cancel_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 0')->num_rows();
			$data['pending_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 1')->num_rows();
			$data['success_service'] = $this->db->query('SELECT * FROM transaction WHERE status = 2')->num_rows();

			$data['service7']  = $this->db->query("SELECT * FROM transaction INNER JOIN client ON transaction.id_client=client.id_client WHERE transaction.status = 2 LIMIT 5")->result();
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

	public function service_()
	{
		$data = $this->db->query('SELECT nama_layanan, COUNT(nama_layanan) AS jumlah_jual FROM invoice GROUP BY nama_layanan ORDER BY jumlah_jual  DESC')->result();
		echo json_encode($data);
	}
	
	public function ambulance()
	{
		$data = $this->M_Dashboard->ambulance();
		echo json_encode($data);
	}
}
