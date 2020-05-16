<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a href="<?= base_url('admin/client') ?>">
								<h4> Total Client</h4>
							</a>
						</div>
						<div class="card-body">
							<?= $client ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-2">
					<div class="card-header">
						<div class="col-6">
							<a href="<?= base_url('admin/ambulance/sewa/history') ?>">
								<h4> Statistik Sewa Ambulance</h4>
							</a>
						</div>
						<div class="form-group col-6">
							<label>Filter by Bulan</label>
							<select class="form-control selectric filterambulan" id="filterambulance" name="">
								<option value="00" selected>-- Show All --</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							Tahun
							<select class="form-control selectric filterambulan" name="tahun" id="tahunambulan">
								<option value="0000" selected>-- Show All --</option>
								<?php
								$mulai = date('Y') - 5;
								for ($i = $mulai; $i < $mulai + 100; $i++) {
									$sel = $i == date('Y') ? ' selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>

					</div>
					<div class="card-icon shadow-primary bg-primary ">
						<i class="fas fa-archive"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">

							<h4>Total</h4>
						</div>
						<div class="card-body" id="jumlahambulance">

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-2">
					<div class="card-stats">
						<div class="card-stats-title">
							Statistik Penyedia Jasa
						</div>
						<div class="form-group col-6">
							<label>Filter by Bulan</label>
							<select class="form-control selectric filterservis" id="filterservis" name="">
								<option value="00" selected>-- Show All --</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>

							Tahun
							<select class="form-control selectric filterservis" name="tahun" id="tahunservis">
								<option value="0000" selected>-- Show All --</option>
								<?php
								$mulai = date('Y') - 5;
								for ($i = $mulai; $i < $mulai + 100; $i++) {
									$sel = $i == date('Y') ? ' selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>

						</div>
						<div class="col-6">


						</div>
						<div class="card-stats-items">
							<div class="card-stats-item">
								<div class="card-stats-item-count" id="servisgagal"></div>
								<div class="card-stats-item-label"><a href="<?= base_url('admin/invoice/failed') ?>">Gagal</a></div>
							</div>
							<div class="card-stats-item">
								<div class="card-stats-item-count" id="servispending"><?= $pending_service ?></div>
								<div class="card-stats-item-label"><a href="<?= base_url('admin/invoice') ?>">Pending</a></div>
							</div>
							<div class="card-stats-item">
								<div class="card-stats-item-count" id="servissukses"><?= $success_service ?></div>
								<div class="card-stats-item-label"><a href="<?= base_url('admin/invoice/success') ?>">Sukses</a></div>
							</div>
						</div>
					</div>
					<div class="card-icon shadow-primary bg-primary">
						<i class="fas fa-archive"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total</h4>
						</div>
						<div class="card-body" id="servistotal">
							<?= $service ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h4>Statistik Berdasarkan Kategori Layanan</h4>
					</div>
					<div class="card-body">
						<div id="statistik" style="width: 600px; height: 350px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h4>Statistik Berdasarkan Layanan</h4>
					</div>
					<div class="card-body">
						<div id="statistik-produk" style="width: 600px; height: 350px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>5 Transaksi Terakhir</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="text-center">
											#
										<th class="text-center">
											No Invoice
										</th>
										<th>Nama Pasien</th>
										<th>Alamat</th>
										<th>No Telepon</th>
										<th>Tanggal Peminjaman</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($service7 as $row) :
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate)); ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row->no_invoice ?></td>
											<td><?= $row->nama ?></td>
											<td><?= $row->alamat ?></td>
											<td><?= $row->phone ?></td>
											<td><?= $newDate ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- gugel chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Nama Layanan', 'Jumlah'],
			['Penyedia Jasa', <?= $chartjasa[0]->a ?>],
			['Ambulance', <?= $chartambu[0]->c ?>]

		]);

		var options = {
			title: ''
		};

		var chart = new google.visualization.PieChart(document.getElementById('statistik'));

		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Nama Layanan', 'Jumlah'],
			<?php foreach ($chartlayanan as $lay) : ?>['<?= $lay->nama_layanan ?>', <?= $lay->jumlah_jual ?>],
			<?php endforeach; ?>
		]);

		var options = {
			title: ''
		};

		var chart = new google.visualization.PieChart(document.getElementById('statistik-produk'));

		chart.draw(data, options);
	}
</script>

<?php $this->load->view('dist/_partials/footer'); ?>