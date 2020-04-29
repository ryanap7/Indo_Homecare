<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentController extends CI_Controller
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
				'title' => "Payment Type"
			);
			$data['payment']	 	= $this->db->query("SELECT * FROM GYM_TBL_PAYMENT")->result();
			$this->load->view('pages/payment/index', $data);
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
			'title' => "Payment Type"
		);
		$this->load->view('pages/payment/add', $data);
    }
    
    public function store()
    {
		$payment              		= $this->input->post('payment');
		
		$data= array(
			'PAYMENT_ID'	=> NULL,
			'PAYMENT_NAME'	=> $payment
		);
	
		$this->db->insert('GYM_TBL_PAYMENT', $data);
		redirect('admin/payment');
    }
    
    public function edit($id)
	{
		$data = array(
			'title' => "Payment Type"
		);
		$where = array('PAYMENT_ID' => $id);
		$data['payment'] = $this->db->query("SELECT * FROM GYM_TBL_PAYMENT WHERE PAYMENT_ID='$id'")->result();
		$this->load->view('pages/payment/edit', $data);
    }
    
    public function update()
    {
		$id						= $this->input->post('id');
		$payment              	= $this->input->post('payment');
		
		$data= array(
			'PAYMENT_NAME'			=> $payment
		);
	
		$where = array('PAYMENT_ID' => $id);
		$this->db->update('GYM_TBL_PAYMENT', $data, $where);
		redirect('admin/payment');
    }
    
    public function delete($id)
    {
		$where = array('PAYMENT_ID' => $id);
		$this->db->delete('GYM_TBL_PAYMENT', $where);
		redirect('admin/payment ');     
    }
}