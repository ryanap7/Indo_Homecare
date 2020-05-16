<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalendarController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');	
		}
		$this->load->model('M_Calendar');
  	}

	public function index() {
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Calendar"
			);
			$this->load->view('pages/Admin/calendar/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function load_calendar(){
		$event_data1 = $this->db->query("SELECT * FROM transaction INNER JOIN client ON transaction.id_client = client.id_client");
		$event_data2 = $this->M_Calendar->ambulance();
		foreach($event_data1->result_array() as $row){
			$data[] = array(
				'id'				=> $row['id'],
				'title'				=> 'Expired '.$row['nama'],
				'start'				=> $row['date_expired'],
				'backgroundColor'	=> '#63ED7A',
      			'borderColor'		=> '#fff',
      			'textColor'			=> '#fff'
			);
		}

		foreach($event_data2->result_array() as $row){
			$data[] = array(
				'id'				=> $row['id_sewa'],
				'title'				=> 'Histori Peminjaman ',
				'start'				=> $row['date'],
				'backgroundColor'	=> '#6777EF',
      			'borderColor'		=> '#fff',
      			'textColor'			=> '#fff'
			);
		}
		echo json_encode($data);
	}
}
