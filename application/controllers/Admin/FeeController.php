<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeeController extends CI_Controller
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
				'title' => "Fee"
			);
			$data['fee']	 	= $this->db->query("SELECT * FROM GYM_TBL_FEE")->result();
			$this->load->view('pages/fee/index', $data);
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
			'title' => "Fee"
		);
		$this->load->view('pages/fee/add', $data);
    }
    
    public function store()
    {
        $name              		= $this->input->post('name');
        $price             		= $this->input->post('price');
		
		$data= array(
			'FEE_ID'	=> NULL,
            'FEE_NAME'	=> $name,
            'FEE_PRICE'	=> $price
		);
	
		$this->db->insert('GYM_TBL_FEE', $data);
		redirect('admin/fee');
    }
    
    public function edit($id)
	{
		$data = array(
			'title' => "Fee"
		);
		$where = array('FEE_ID' => $id);
		$data['fee'] = $this->db->query("SELECT * FROM GYM_TBL_FEE WHERE FEE_ID='$id'")->result();
		$this->load->view('pages/fee/edit', $data);
    }
    
    public function update()
    {
		$id						= $this->input->post('id');
        $name                	= $this->input->post('name');
        $price                	= $this->input->post('price');
		
		$data= array(
            'FEE_NAME'			=> $name,
            'FEE_PRICE'			=> $price,
		);
	
		$where = array('FEE_ID' => $id);
		$this->db->update('GYM_TBL_FEE', $data, $where);
		redirect('admin/fee');
    }
    
    public function delete($id)
    {
		$where = array('FEE_ID' => $id);
		$this->db->delete('GYM_TBL_FEE', $where);
		redirect('admin/fee');     
    }
}