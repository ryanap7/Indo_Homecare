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
			$this->load->view('pages/Koordinator/dashboard/index.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
    }
}
