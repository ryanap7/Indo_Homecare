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
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Invoice');
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$pdf->WriteHTMLCell(0, 0, '', '','', 0, 1, 0, true, 'C', true);
		$client	 			= $this->db->query("SELECT * FROM sewa_alkes INNER JOIN client ON sewa_alkes.id_client=client.id_client WHERE sewa_alkes.id_sewa=$id")->result();
		$transaction	 	= $this->M_Sewa->get_id_sewa($id);
		$invoice		 	= $this->M_Sewa->get_id_detail($id);
		$html='';
		$pdf->writeHTML($html, true, false, true, false, '');
		$table = '<table stripped style="; padding:4px;">';
		foreach($client as $row){
			$originalDate = $row->date;
			$newDate = date("d M Y", strtotime($originalDate));
			$ex = $row->date_expired;
			$Date = date("d M Y", strtotime($ex));
			$table = '<table style="padding:4xpx;padding-top: -30px">';		
			$table .= '<tr>
			<th style="" align="right"><strong>INVOICE #</strong></th>
			<td>'.$row->no_invoice.'</td>
			</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -30px">';		
			$tablekiri .= '<tr>
			<th style="" align="left"><strong>DITAGIHKAN KEPADA</strong></th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);	
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);
		foreach($client as $row){
		$table = '<table style="padding:4xpx;padding-top:-23px">';		
		$table .= '<tr>
						<th style="" align="right"><strong>Tanggal</strong></th>
						<td>'.$newDate.'</td>
					</tr>';
		$table .= '</table>';
		$tablekiri = '<table style="padding-top: -22px">';		
			$tablekiri .= '<tr>
			<th style="" align="left">'.$row->nama.'</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);
		foreach($client as $row){
		$table = '<table style="padding:4xpx;padding-top:-16px">';		
		$table .= '<tr>
						<th style="" align="right"><strong>Jatuh tempo</strong></th>
						<td>'.$Date.'</td>
					</tr>';
		$table .= '</table>';
		$tablekiri = '<table style="padding-top: -18px">';		
			$tablekiri .= '<tr>
			<th style="" align="left">'.$row->phone.'</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);
		$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="250px">Jasa Layanan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Quantity</th>						
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Harga</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">Jumlah</th>
					</tr>';
					
		$subtotal = 0;
		foreach($invoice as $row){
		$jumlah = $row->qty * $row->harga;
		$table .= '<tr align="center">
						<td style="border:1px solid #ddd;">'.$row->nama.'</td>						
						<td style="border:1px solid #ddd;">'.$row->qty.'</td>
						<td style="border:1px solid #ddd;">'.'Rp. '.rupiah($row->harga).'</td>
						<td style="border:1px solid #ddd;">'.'Rp. '.rupiah($jumlah).'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 15, '',$table, 0, 1, 0, true, 'C', true);

		foreach($invoice as $row){
		$jumlah = $row->qty * $row->harga;
		$subtotal += $jumlah;
		$table = '<table style="padding:4xpx;">';		
		$table .= '<tr>
						<th style="" align="right">Subtotal</th>
						<td>'.'Rp. '.rupiah($subtotal).'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);

		$table = '<table style="padding:4xpx;padding-top: -7px">';		
		$table .= '<tr>
						<th style="" align="right">Total</th>
						<td>'.'Rp. '.rupiah($subtotal).'</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);

		foreach($invoice as $row){
		$table = '<table style="padding:4xpx;padding-top: -7px;padding-left:-90px">';		
		$table .= '<tr>
						<td>Lunas Pada '.$newDate.'</td>
						<td>'.'Rp. '.rupiah($subtotal).'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);
		$table = '<table style="padding:4xpx;padding-top: -2px" >';		
		$table .= '<tr>
						<th style="" align="right"><strong>Jumlah Yang Harus Dibayar</strong></th>
						<td>Rp. 0</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);

		$pdf->SetFont('times', 'B', 12);
		$table = '<table style="padding:4xpx;">';		
		$table .= '<tr>
						<th style="font-size: 26px;color: red">Lunas</th>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, '',$table, 0, 1, 0, true, 'R', true);

		$now = date('d-m-Y');
		
		$pdf->lastPage();
		// ob_clean();
		foreach($client as $row){
			$invioce = $row->no_invoice;
		}
		$pdf->Output('Invoice-'.$invioce.'.pdf', 'I');

	}
}
