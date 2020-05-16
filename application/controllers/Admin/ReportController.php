<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');
		}
	}

	public function pengeluaran()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Laporan Keuangan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pengeluaran")->result();
			$this->load->view('pages/Admin/report/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function ambulance()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Laporan Keuangan"
			);
			$data['admin']	 			= $this->db->query("SELECT * FROM client INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE sewa_ambulance.status_peminjaman = 1")->result();
			$data['tahun']	 			= $this->db->query("SELECT DISTINCT date FROM sewa_ambulance WHERE sewa_ambulance.status_peminjaman = 1")->result();
			$this->load->view('pages/Admin/report/ambulance.php', $data);
		} else {
			redirect('/');
		}
	}


	public function service()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Laporan Keuangan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM client INNER JOIN transaction ON client.id_client = transaction.id_client INNER JOIN invoice ON transaction.id = invoice.id_transaction WHERE transaction.status = 2")->result();
			$this->load->view('pages/Admin/report/service.php', $data);
		} else {
			redirect('/');
		}
	}


	public function filter()
	{
		$bulan = $_GET['filter1'];
		$tahun = date('Y');
		$data = array(
			'title' => "Laporan Keuangan"
		);

		if ($bulan == 00) {
			$data	 			= $this->db->query("SELECT * FROM client INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE sewa_ambulance.status_peminjaman = 1")->result();
		} else {
			$data	 			= $this->db->query("SELECT * FROM client INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND sewa_ambulance.status_peminjaman = 1")->result();
		}

		if (!empty($data)) {
			$no = 1;
			foreach ($data as $row) :
				$originalDate = $row->date;
				$newDate = date("d M Y", strtotime($originalDate)); ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->name ?></td>
					<td>Rp. <?= rupiah($row->harga) ?></td>
					<td><?= $newDate ?></td>
				</tr>
			<?php endforeach; ?> <?php
								} else {
									?>
			<tr>
				<td colspan="4" align="center">Tidak ada Data</td>
			</tr>
			<?php
								}
							}






							public function filter1()
							{
								$bulan = $_GET['filter2'];
								$tahun = date('Y');
								$data = array(
									'title' => "Laporan Keuangan"
								);

								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT *, client.nama as name FROM client INNER JOIN sewa_alkes ON client.id_client = sewa_alkes.id_client INNER JOIN detail_sewa ON sewa_alkes.id_sewa = detail_sewa.id_sewa WHERE sewa_alkes.status = 2")->result();
								} else {
									$data	 			= $this->db->query("SELECT *, client.nama as name FROM client INNER JOIN sewa_alkes ON client.id_client = sewa_alkes.id_client INNER JOIN detail_sewa ON sewa_alkes.id_sewa = detail_sewa.id_sewa WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND sewa_alkes.status = 2")->result();
								}

								if (!empty($data)) {
									$no = 1;
									foreach ($data as $row) :
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));
										$total = $row->qty * $row->harga;
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->name ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->qty ?></td>
					<td>Rp. <?= rupiah($row->harga) ?></td>
					<td>Rp. <?= rupiah($total) ?></td>
					<td><?= $newDate ?></td>
				</tr>
			<?php endforeach; ?> <?php
								} else {
									?>
			<tr>
				<td colspan="6" align="center">Tidak ada Data</td>
			</tr>
			<?php
								}
							}

							public function filter2()
							{
								$bulan = $_GET['filter3'];
								$tahun = date('Y');
								$data = array(
									'title' => "Laporan Keuangan"
								);

								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT * FROM client INNER JOIN transaction ON client.id_client = transaction.id_client INNER JOIN invoice ON transaction.id = invoice.id_transaction WHERE transaction.status = 2")->result();
								} else {
									$data	 			= $this->db->query("SELECT * FROM client INNER JOIN transaction ON client.id_client = transaction.id_client INNER JOIN invoice ON transaction.id = invoice.id_transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND transaction.status = 2")->result();
								}

								if (!empty($data)) {
									$no = 1;
									foreach ($data as $row) :
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));;
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->nama_layanan ?></td>
					<td><?= $row->periode ?></td>
					<td>Rp. <?= rupiah($row->harga) ?></td>
					<td><?= $newDate ?></td>
				</tr>
			<?php endforeach; ?> <?php
								} else {
									?>
			<tr>
				<td colspan="6" align="center">Tidak ada Data</td>
			</tr>
			<?php
								}
							}

							public function filter3()
							{
								$bulan = $_GET['filter4'];
								$tahun = date('Y');
								$data = array(
									'title' => "Laporan Keuangan"
								);

								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT * FROM pengeluaran")->result();
								} else {
									$data	 			= $this->db->query("SELECT * FROM pengeluaran WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun")->result();
								}

								if (!empty($data)) {
									$no = 1;
									foreach ($data as $row) :
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate)); ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->desc ?></td>
					<td>Rp. <?= rupiah($row->nominal); ?></td>
					<td><?= $newDate ?></td>
				</tr>
			<?php endforeach; ?>
		<?php
								} else {
		?>
			<tr>
				<td colspan="4" align="center">Tidak ada Data</td>
			</tr>
			<?php
								}
							}

							public function print_pengeluaran()
							{
								$bulan = $this->input->post('bulan');
								$tahun = date('Y');
								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT * FROM pengeluaran")->result();
								} else {
									$data	 			= $this->db->query("SELECT * FROM pengeluaran WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun")->result();
								}
								$pdf = new Pdf2(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
								$pdf->SetTitle('Laporan');
								$pdf->SetPrintFooter(false);
								$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
								$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
								$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
								$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
								$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
								$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
								$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
								$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
								$pdf->SetFont('times', '', 10);
								$pdf->AddPage();
								$pdf->setCellPaddings(1, 1, 1, 1);
								$pdf->setCellMargins(1, 1, 1, 1);
								$pdf->SetFillColor(255, 255, 127);
								$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
								$html = 'Periode : ' . $bulan . '-' . $tahun;
								$pdf->writeHTML($html, true, false, true, false, '');
								$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
								$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="300px">Deskripsi</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Tanggal</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Nominal</th>						
					</tr>';
								if (!empty($data)) {
									foreach ($data as $row) {
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));
										$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->desc . '</td>						
							<td style="border:1px solid #ddd;">' . $newDate . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->nominal) . '</td>
						</tr>';
									}
								} else {
									echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
								}
								$table .= '</table>';
								$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
								$subtotal = 0;
								foreach ($data as $row) {
									$subtotal += $row->nominal;
									$table = '<table style="padding:4xpx;">';
									$table .= '<tr>
							<th style="" align="right">Total</th>
							<td>' . 'Rp. ' . rupiah($subtotal) . '</td>
						</tr>';
									$table .= '</table>';
								}
								$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

								$pdf->lastPage();
								// ob_clean();
								$pdf->Output('Laporan-Pengeluaran.pdf', 'I');
							}

							public function print_ambulance()
							{
								$bulan = $this->input->post('bulan');
								$tahun = date('Y');
								if ($bulan == 00) {
									$data	 			= $this->db->query("SELECT * FROM client INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE sewa_ambulance.status_peminjaman = 1")->result();
								} else {
									$data	 			= $this->db->query("SELECT * FROM sewa_ambulance INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND sewa_ambulance.status_peminjaman = 1")->result();
								}
								$pdf = new Pdf3(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
								$pdf->SetTitle('Laporan');
								$pdf->SetPrintFooter(false);
								$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
								$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
								$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
								$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
								$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
								$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
								$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
								$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
								$pdf->SetFont('times', '', 10);
								$pdf->AddPage();
								$pdf->setCellPaddings(1, 1, 1, 1);
								$pdf->setCellMargins(1, 1, 1, 1);
								$pdf->SetFillColor(255, 255, 127);
								$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
								$html = 'Periode : ' . $bulan . '-' . $tahun;
								$pdf->writeHTML($html, true, false, true, false, '');
								$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
								$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="150px">Nama Client</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="150px">Nama Ambulance</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Tanggal</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Harga</th>						
					</tr>';
								if (!empty($data)) {
									foreach ($data as $row) {
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));
										$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->nama . '</td>
							<td style="border:1px solid #ddd;">' . $row->name . '</td>						
							<td style="border:1px solid #ddd;">' . $newDate . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->harga) . '</td>
						</tr>';
									}
								} else {
									echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
								}
								$table .= '</table>';
								$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
								$subtotal = 0;
								foreach ($data as $row) {
									$subtotal += $row->harga;
									$table = '<table style="padding:4xpx;">';
									$table .= '<tr>
							<th style="" align="right">Total</th>
							<td>' . 'Rp. ' . rupiah($subtotal) . '</td>
						</tr>';
									$table .= '</table>';
								}
								$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

								$pdf->lastPage();
								// ob_clean();
								$pdf->Output('Laporan-SewaAmbulance-' . $bulan . '.pdf', 'I');
							}

							public function print_alkes()
							{
								$bulan = $this->input->post('bulan');
								$tahun = date('Y');
								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT *, client.nama as name FROM client INNER JOIN sewa_alkes ON client.id_client = sewa_alkes.id_client INNER JOIN detail_sewa ON sewa_alkes.id_sewa = detail_sewa.id_sewa WHERE sewa_alkes.status = 2")->result();
								} else {
									$data	 			= $this->db->query("SELECT *, client.nama as name FROM client INNER JOIN sewa_alkes ON client.id_client = sewa_alkes.id_client INNER JOIN detail_sewa ON sewa_alkes.id_sewa = detail_sewa.id_sewa WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND sewa_alkes.status = 2")->result();
								}
								$pdf = new Pdf4(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
								$pdf->SetTitle('Laporan');
								$pdf->SetPrintFooter(false);
								$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
								$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
								$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
								$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
								$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
								$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
								$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
								$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
								$pdf->SetFont('times', '', 10);
								$pdf->AddPage();
								$pdf->setCellPaddings(1, 1, 1, 1);
								$pdf->setCellMargins(1, 1, 1, 1);
								$pdf->SetFillColor(255, 255, 127);
								$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
								$html = 'Periode : ' . $bulan . '-' . $tahun;
								$pdf->writeHTML($html, true, false, true, false, '');
								$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
								$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">Nama Client</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">Nama Barang</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Quantity</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Tanggal</th>						
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Harga</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Jumlah</th>
					</tr>';
								if (!empty($data)) {
									foreach ($data as $row) {
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));
										$jumlah = $row->qty * $row->harga;
										$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->name . '</td>
							<td style="border:1px solid #ddd;">' . $row->nama . '</td>						
							<td style="border:1px solid #ddd;">' . $row->qty . '</td>
							<td style="border:1px solid #ddd;">' . $newDate . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->harga) . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($jumlah) . '</td>
						</tr>';
									}
								} else {
									echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
								}
								$table .= '</table>';
								$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
								$subtotal = 0;
								foreach ($data as $row) {
									$jumlah = $row->qty * $row->harga;
									$subtotal += $jumlah;
									$table = '<table style="padding:4xpx;">';
									$table .= '<tr>
							<th style="" align="right">Total</th>
							<td>' . 'Rp. ' . rupiah($subtotal) . '</td>
						</tr>';
									$table .= '</table>';
								}
								$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

								$pdf->lastPage();
								// ob_clean();
								$pdf->Output('Laporan-SewaAmbulance-' . $bulan . '.pdf', 'I');
							}

							public function print_layanan()
							{
								$bulan = $this->input->post('bulan');
								$tahun = date('Y');
								if ($bulan == 00) {
									$data	 	= $this->db->query("SELECT * FROM client INNER JOIN transaction ON client.id_client = transaction.id_client INNER JOIN invoice ON transaction.id = invoice.id_transaction WHERE transaction.status = 2")->result();
								} else {
									$data	 			= $this->db->query("SELECT * FROM client INNER JOIN transaction ON client.id_client = transaction.id_client INNER JOIN invoice ON transaction.id = invoice.id_transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND transaction.status = 2")->result();
								}
								$pdf = new Pdf5(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
								$pdf->SetTitle('Laporan');
								$pdf->SetPrintFooter(false);
								$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
								$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
								$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
								$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
								$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
								$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
								$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
								$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
								$pdf->SetFont('times', '', 10);
								$pdf->AddPage();
								$pdf->setCellPaddings(1, 1, 1, 1);
								$pdf->setCellMargins(1, 1, 1, 1);
								$pdf->SetFillColor(255, 255, 127);
								$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
								$html = 'Periode : ' . $bulan . '-' . $tahun;
								$pdf->writeHTML($html, true, false, true, false, '');
								$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
								$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Nama Client</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Nama Layanan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Periode</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Tanggal</th>						
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Harga</th>
					</tr>';
								if (!empty($data)) {
									foreach ($data as $row) {
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));
										$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->nama . '</td>
							<td style="border:1px solid #ddd;">' . $row->nama_layanan . '</td>						
							<td style="border:1px solid #ddd;">' . $row->periode . '</td>
							<td style="border:1px solid #ddd;">' . $newDate . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->harga) . '</td>
						</tr>';
									}
								} else {
									echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
								}
								$table .= '</table>';
								$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
								$subtotal = 0;
								foreach ($data as $row) {
									$subtotal += $row->harga;
									$table = '<table style="padding:4xpx;">';
									$table .= '<tr>
							<th style="" align="right">Total</th>
							<td>' . 'Rp. ' . rupiah($subtotal) . '</td>
						</tr>';
									$table .= '</table>';
								}
								$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

								$pdf->lastPage();
								// ob_clean();
								$pdf->Output('Laporan-SewaAmbulance-' . $bulan . '.pdf', 'I');
							}



							public function filterambulan()
							{
								$bulan = $_GET['filterambulanget'];
								$tahun = $_GET['filtertahunget'];

								if ($bulan == 00 && $tahun == 0000) {
									$data	 			= $this->db->query("SELECT * FROM sewa_ambulance WHERE status_peminjaman = 1")->num_rows();
								} elseif ($bulan == 00 && $tahun != 0000) {
									$data	 			= $this->db->query("SELECT * FROM sewa_ambulance WHERE YEAR(date) = $tahun AND status_peminjaman = 1")->num_rows();
								} elseif ($bulan != 00 && $tahun == 0000) {
									$data	 			= $this->db->query("SELECT * FROM sewa_ambulance WHERE MONTH(date) = $bulan AND status_peminjaman = 1")->num_rows();
								} else {
									$data	 			= $this->db->query("SELECT * FROM sewa_ambulance WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND status_peminjaman = 1")->num_rows();
								}
								if (!empty($data)) {
									echo $data  ?><?php
												} else {
													?>

			<h5>0</h5>
		<?php
												}
											}
											public function filterservis()
											{
												$bulan = $_GET['filterservisget'];
												$tahun = $_GET['filtertahunget'];

												if ($bulan == 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction")->num_rows();
												} elseif ($bulan == 00  && $tahun != 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE YEAR(date) = $tahun")->num_rows();
												} elseif ($bulan != 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan")->num_rows();
												} else {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun")->num_rows();
												}

												if (!empty($data)) {
													echo $data ?>
		<?php
												} else {
		?>
			<h5>0</h5>
		<?php
												}
											}
											public function filterservisgagal()
											{
												$bulan = $_GET['filterservisget'];
												$tahun = $_GET['filtertahunget'];

												if ($bulan == 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE status = 0")->num_rows();
												} elseif ($bulan == 00  && $tahun != 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE YEAR(date) = $tahun AND status = 0")->num_rows();
												} elseif ($bulan != 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND status = 0")->num_rows();
												} else {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND status = 0")->num_rows();
												}

												if (!empty($data)) {
													echo $data ?>
		<?php
												} else {
		?>
			<h5>0</h5>
		<?php
												}
											}
											public function filterservispending()
											{
												$bulan = $_GET['filterservisget'];
												$tahun = $_GET['filtertahunget'];

												if ($bulan == 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE status = 1")->num_rows();
												} elseif ($bulan == 00  && $tahun != 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE YEAR(date) = $tahun AND status = 1")->num_rows();
												} elseif ($bulan != 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND status = 1")->num_rows();
												} else {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND status = 1")->num_rows();
												}

												if (!empty($data)) {
													echo $data ?>
		<?php
												} else {
		?>
			<h5>0</h5>
		<?php
												}
											}
											public function filterservissukses()
											{
												$bulan = $_GET['filterservisget'];
												$tahun = $_GET['filtertahunget'];

												if ($bulan == 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE status = 2")->num_rows();
												} elseif ($bulan == 00  && $tahun != 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE YEAR(date) = $tahun AND status = 2")->num_rows();
												} elseif ($bulan != 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND status = 2")->num_rows();
												} else {
													$data	 			= $this->db->query("SELECT * FROM transaction WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun AND status = 2")->num_rows();
												}

												if (!empty($data)) {
													echo $data ?>
		<?php
												} else {
		?>
			<h5>0</h5>
			<?php
												}
											}
											public function filterkeuangan()
											{

												$tahun = $_GET['filterkeuanganget'];

												$bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
												$jmlbulan = count($bulan) - 1;

												$dataakhir = [];
												if ($tahun == 0000) {
													for ($i = 0; $i <= $jmlbulan; $i++) {
														$datamasuk1[$i] = $this->db->query("SELECT SUM(harga) as harga1 FROM invoice JOIN transaction ON id_transaction = transaction.id")->result();
														$datamasuk2[$i] = $this->db->query("SELECT SUM(harga) as harga2 FROM sewa_ambulance")->result();
														$dataakhir[$i] =  [$datamasuk1[$i][$i]->harga1 + $datamasuk2[$i][$i]->harga2];
													}
													return json_encode($dataakhir);
												}
											}



											public function filterhistoryambulance()
											{
												$bulan = $_GET['filtergetambulance'];
												$tahun = $_GET['filtergettahunambulance'];
												$data = array(
													'title' => "Laporan Sewa Ambulance"
												);

												if ($bulan == 00 && $tahun == 0000) {
													$data	 	= $this->db->query("SELECT * FROM client 
													INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client 
													INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance")->result();
												} elseif ($bulan != 00 && $tahun == 0000) {
													$data	 			= $this->db->query("SELECT * FROM client 
													INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client 
													INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE MONTH(date) = $bulan")->result();
												} elseif ($bulan == 00 && $tahun != 0000) {
													$data	 			= $this->db->query("SELECT * FROM client 
													INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client 
													INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE YEAR(date) = $tahun")->result();
												} else {
													$data	 			= $this->db->query("SELECT * FROM client 
													INNER JOIN sewa_ambulance ON client.id_client = sewa_ambulance.id_client 
													INNER JOIN ambulance ON sewa_ambulance.id_ambulance = ambulance.id_ambulance WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun")->result();
												}

												if (!empty($data)) {
													$no = 1;
													foreach ($data as $data) :
														$originalDate = $data->date;
														$newDate = date("d M Y", strtotime($originalDate)); ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data->nama ?></td>
					<td><?= $data->name ?></td>
					<td>Rp. <?= rupiah($data->harga) ?></td>
					<td>
						<?php if ($data->status_peminjaman === '0') { ?>
							<div class="badges">
								<span class="badge badge-info">Process</span>
							</div>
						<?php } else { ?>
							<div class="badges">
								<span class="badge badge-success">Success</span>
							</div>
						<?php } ?>
					</td>
					<td><?= $newDate ?></td>
					<td>
						<?php if ($data->status_peminjaman === '0') { ?>
							<a href="<?php echo base_url('admin/ambulance/sewa/update/') . $data->id_ambulance ?>" class="btn btn-info" onclick="javascript: return confirm('Are you sure want to Confirm ?')" title="Konfirmasi"><i class="fa fa-check"></i></a>
						<?php } ?>
						<a href="<?php echo base_url('admin/ambulance/sewa/delete/') . $data->id_sewa ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php
												} else {
		?>
			<tr>
				<td colspan="4" align="center">Tidak ada Data</td>
			</tr>
<?php
												}
											}
										}
