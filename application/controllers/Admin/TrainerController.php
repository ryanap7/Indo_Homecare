<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainerController extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');	
		}
	}
	
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data = array(
				'title' => "Trainer"
			);
			$data['trainer']	 	= $this->db->query("SELECT * FROM GYM_TBL_TRAINER 
													INNER JOIN GYM_TBL_GENDER ON GYM_TBL_TRAINER.GENDER=GYM_TBL_GENDER.GENDER_ID")->result();
			$this->load->view('pages/trainer/index', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function create()
	{
		$data = array(
			'title' => "Trainer"
		);
		$this->load->view('pages/trainer/add', $data);
	}

	public function store()
    {
		$name              		= $this->input->post('name');
		$gender              	= $this->input->post('gender');
		$dob              		= $this->input->post('dob');
		$address              	= $this->input->post('address');
		$phone              	= $this->input->post('phone');
		$status              	= $this->input->post('status');
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		$convertDate = date("d-M-Y", strtotime($dob));

		$data= array(
			'ID_TRAINER'	=> NULL,
			'NAME'			=> $name,
			'GENDER'		=> $gender,
			'DOB'			=> $convertDate,
			'ADDRESS'		=> $address,
			'PHONE'			=> $phone,
			'STATUS'		=> $status
		);
	
		$this->db->insert('GYM_TBL_TRAINER', $data);
		redirect('admin/trainer');
	}

	public function edit($id)
	{
		$data = array(
			'title' => "Trainer"
		);
		$where = array('ID_TRAINER' => $id);
		$data['trainer'] = $this->db->query("SELECT * FROM GYM_TBL_TRAINER WHERE ID_TRAINER='$id'")->result();
		$this->load->view('pages/trainer/edit', $data);
	}

	public function update()
    {
		$id						= $this->input->post('id');
		$name              		= $this->input->post('name');
		$gender              	= $this->input->post('gender');
		$dob              		= $this->input->post('dob');
		$address              	= $this->input->post('address');
		$phone              	= $this->input->post('phone');
		$status              	= $this->input->post('status');
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		$convertDate = date("d-M-Y", strtotime($dob));

		$data= array(
			'NAME'			=> $name,
			'GENDER'		=> $gender,
			'DOB'			=> $convertDate,
			'ADDRESS'		=> $address,
			'PHONE'			=> $phone,
			'STATUS'		=> $status
		);
	
		$where = array('ID_TRAINER' => $id);
		$this->db->update('GYM_TBL_TRAINER', $data, $where);
		redirect('admin/trainer');
	}

	public function delete($id)
    {
		$where = array('ID_TRAINER' => $id);
		$this->db->delete('GYM_TBL_TRAINER', $where);
		redirect('admin/trainer');     
    }
}
