<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientController extends CI_Controller
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
				'title' => "Data Client"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM client")->result();
			$this->load->view('pages/SuperAdmin/client/index.php', $data);
		} else {
			redirect('/');	
		}
	}
}
