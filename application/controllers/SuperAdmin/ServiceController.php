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
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Layanan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM jasa_medis INNER JOIN category ON jasa_medis.id_category = category.id_category ORDER BY name DESC")->result();
			$this->load->view('pages/SuperAdmin/service/index.php', $data);
		} else {
			redirect('/');		
		}
	}
}
