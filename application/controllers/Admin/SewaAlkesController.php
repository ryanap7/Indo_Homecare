<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SewaAlkesController extends CI_Controller
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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Transaksi"
			);
			$data['sewa']	 	= $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client=client.id_client WHERE sewa_alkes.status = 1")->result();
			$this->load->view('pages/Admin/sewa/index.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function store()
    {
		$is_proses = $this->M_Sewa->index();
		if($is_proses)
		{
			$this->cart->destroy();
			redirect('admin/sewa_alkes');
		}else{
			"Maaf Transaksi Anda tidak dapat Kami Proses";
		}
	}

	public function request()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Transaksi"
			);
			
			$table = "sewa_alkes";
			$field = "no_invoice";

			$today = date('y.md');

			$prefix = "NMK/" . $today;

			$lastCode = $this->M_Sewa->generate($prefix, $table, $field);

			$noUrut = (int) substr($lastCode, -3, 3);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%03s', $noUrut);


			$data['alkes']				 	= $this->db->query("SELECT * FROM alkes")->result();
			$data['client']				 	= $this->db->query("SELECT * FROM client")->result();
			$this->load->view('pages/Admin/sewa/request.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function add_cart()
	{
		$data = array(
			"id"		=> $_POST["id"],
			"name"		=> $_POST["name"],
			"qty"		=> $_POST["qty"],
			"price"		=> $_POST["price"],
			'options' => array('Sesi' => $_POST["sesi"])
		);
		$this->cart->insert($data);
		echo $this->view();
	}

	public function view()
	{
		$output = '';
		$output .= '
			<div class="table-responsive">
				<div align="right">
					<button type="button" id="clear_data" class="btn btn-warning">Clear Cart</button>
					<button type="button" data-toggle="modal" data-target="#choose_client" class="btn btn-info">Checkout</button>
				</div>
				<br>
				<table class="table table-striped" id="example">
					<thead>
						<tr>
							<th>Nama Peralatan Kesehatan</th>
							<th>QTY</th>
							<th>Harga</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
		';
		foreach ($this->cart->contents() as $data) {
			$output .= '
			<tbody>
				<tr>
					<td>'.$data['name'].'</td>
					<td>'.$data['qty'].'</td>
					<td>Rp. '.rupiah($data['price']).'</td>
					<td>Rp. '.rupiah($data['subtotal']).'</td>
					<td><button type="button" name"Cancel" class="btn btn-danger removed fa fa-trash" id="'.$data['rowid'].'" title="Cancel"></button></td>
				</tr>
			</tbody>
			';
		}
		$output .= '
				<tr>
					<td colspan="4" align="right">Total</td>
					<td >Rp. '.rupiah($this->cart->total()).'</td>
				</tr>
			</table>
		</div>
		';

		return $output;
	}

	public function load()
	{
		echo $this->view();
	}

	public function remove()
	{
		$row_id = $_POST["row_id"];
		$data = array(
			'rowid'		=> $row_id,
			'qty'		=> 0
		);

		$this->cart->update($data);
		echo $this->view();
	}

	public function clear()
	{
		$this->cart->destroy();
		echo $this->view();
	}

	public function detail($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Transaksi"
			);
			$data['sewa']			 	= $this->M_Sewa->get_id_sewa($id);
			$data['detail']		 		= $this->M_Sewa->get_id_detail($id);
			$this->load->view('pages/Admin/sewa/detail.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function preview($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Transaksi"
			);
			$data['client']	 			= $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client=client.id_client WHERE sewa_alkes.id_sewa=$id")->result();
			$data['transaction']	 	= $this->M_Sewa->get_id_sewa($id);
			$data['invoice']		 	= $this->M_Sewa->get_id_detail($id);
			$this->load->view('pages/Admin/sewa/preview.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function failed()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Transaksi"
			);
			$data['sewa']	 	= $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client=client.id_client WHERE sewa_alkes.status = 0")->result();
			$this->load->view('pages/Admin/sewa/failed.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function confirm($id)
    {
		$data= array(
			'status'			=> 2	
		);
	
		$where = array('id_sewa' => $id);
		$this->db->update('sewa_alkes', $data, $where);

		redirect('admin/sewa_alkes');
	}

	public function cancel($id)
    {
		
		$data= array(
			'status'			=> 0	
		);
	
		$where = array('id_sewa' => $id);
		$this->db->update('sewa_alkes', $data, $where);

		redirect('admin/sewa_alkes');
	}

	public function success()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Transaksi"
			);
			$data['transaction']	 	= $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client=client.id_client WHERE sewa_alkes.status = 2")->result();
			$this->load->view('pages/Admin/sewa/success.php', $data);
		} else {
			echo "
				<script>
					alert('Access Denied');
					history.go(-1);
				</script>
			";	
		}
	}

	public function download($id)
	{
		$data['transaction']	 	= $this->M_Invoice->get_id_transaction($id);
		$data['invoice']		 	= $this->M_Invoice->get_id_invoice($id);

		$this->load->view('pages/Admin/transaksi/pdf.php',$data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Invoice.pdf", array('Attachment' => 0 ));

	}
}
