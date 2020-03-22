<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');	
		}
  	}

	public function index() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data = array(
				'title' => "Dashboard"
			);
			$this->load->view('pages/dashboard', $data);
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
