<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MembershipController extends CI_Controller
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
				'title' => "Membership"
			);
			$data['membership']	 	= $this->db->query("SELECT * FROM GYM_TBL_MEMBERSHIP")->result();
			$this->load->view('pages/membership/index', $data);
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
			'title' => "Registration Member"
		);
		$this->load->view('pages/member/add', $data);
    }

    public function store()
    {
        $name              		= $this->input->post('name');
        $price              	= $this->input->post('price');
		
		$data= array(
			'MEMBERSHIP_ID'	    => NULL,
            'MEMBERSHIP_NAME'	=> $name,
            'PRICE'             => $price
		);
	
		$this->db->insert('GYM_TBL_MEMBERSHIP', $data);
		redirect('admin/membership');
    }

    public function edit($id)
	{
		$data = array(
			'title' => "Membership"
		);
		$where = array('MEMBERSHIP_ID' => $id);
		$data['membership'] = $this->db->query("SELECT * FROM GYM_TBL_MEMBERSHIP WHERE MEMBERSHIP_ID='$id'")->result();
		$this->load->view('pages/membership/edit', $data);
    }

    public function update()
    {
		$id						= $this->input->post('id');
        $name               	= $this->input->post('name');
        $price               	= $this->input->post('price');
		
		$data= array(
            'MEMBERSHIP_NAME'			=> $name,
            'PRICE'                     => $price
		);
	
		$where = array('MEMBERSHIP_ID' => $id);
		$this->db->update('GYM_TBL_MEMBERSHIP', $data, $where);
        redirect('admin/membership');
	}

	public function delete($id)
    {
		$where = array('MEMBERSHIP_ID' => $id);
		$this->db->delete('GYM_TBL_MEMBERSHIP', $where);
		redirect('admin/membership ');     
    }
}