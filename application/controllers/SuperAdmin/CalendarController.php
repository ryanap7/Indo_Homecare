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

	public function ambulance() {
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Calendar"
			);
			$this->load->view('pages/SuperAdmin/calendar/ambulance.php', $data);
		} else {
			redirect('/');
		}
	}

	public function service() {
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Calendar"
			);
			$this->load->view('pages/SuperAdmin/calendar/service.php', $data);
		} else {
			redirect('/');
		}
	}

	public function alkes() {
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Calendar"
			);
			$this->load->view('pages/SuperAdmin/calendar/alkes.php', $data);
		} else {
			redirect('/');
		}
	}
	
	public function load_ambulance(){
		$event_data = $this->M_Calendar->ambulance();
		foreach($event_data->result_array() as $row){
			$data[] = array(
				'id'				=> $row['id_sewa'],
				'title'				=> 'Histori Peminjaman ',
				'start'				=> $row['date'],
				'backgroundColor'	=> '#DC3545',
      			'borderColor'		=> '#fff',
      			'textColor'			=> '#fff'
			);
		}
		echo json_encode($data);
	}

	public function load_service(){
		$event_data = $this->db->query("SELECT * FROM transaction INNER JOIN client ON transaction.id_client = client.id_client");
		foreach($event_data->result_array() as $row){
			$data[] = array(
				'id'				=> $row['id'],
				'title'				=> 'Expired '.$row['nama'],
				'start'				=> $row['date_expired'],
				'backgroundColor'	=> '#DC3545',
      			'borderColor'		=> '#fff',
      			'textColor'			=> '#fff'
			);
		}
		echo json_encode($data);
	}
	public function load_alkes(){
		$event_data = $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client = client.id_client");
		foreach($event_data->result_array() as $row){
			$data[] = array(
				'id'				=> $row['id_sewa'],
				'title'				=> 'Expired	Kontrak '.$row['nama'],
				'start'				=> $row['date_expired'],
				'backgroundColor'	=> '#DC3545',
      			'borderColor'		=> '#fff',
      			'textColor'			=> '#fff'
			);
		}
		echo json_encode($data);
	}
}
