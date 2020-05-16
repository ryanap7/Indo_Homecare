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
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Dashboard"
			);
			$data['client'] 					= $this->db->query('SELECT * FROM client WHERE status = 1')->num_rows();
			$data['karyawan'] 					= $this->db->query('SELECT * FROM employees')->num_rows();
			$data['karyawan_aktif'] 			= $this->db->query('SELECT * FROM employees WHERE status = 1')->num_rows();
			$data['karyawan_nonaktif'] 			= $this->db->query('SELECT * FROM employees WHERE status = 0')->num_rows();
			$data['profesi']	 				= $this->db->query("SELECT * FROM profesi")->result();
			$data['dokter'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 1')->num_rows();
			$data['perawat'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 2')->num_rows();
			$data['caregiver'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 3')->num_rows();
			$data['bidan'] 						= $this->db->query('SELECT * FROM employees WHERE id_profesi = 4')->num_rows();
			$data['fisioterapi'] 				= $this->db->query('SELECT * FROM employees WHERE id_profesi = 5')->num_rows();
			$data['okupasi'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 6')->num_rows();
			$data['wicara'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 7')->num_rows();
			$data['akupuntur'] 					= $this->db->query('SELECT * FROM employees WHERE id_profesi = 8')->num_rows();

				
			$this->load->view('pages/Koordinator/dashboard/index.php', $data);
		} else {
			redirect('/');	
		}
    }
}
