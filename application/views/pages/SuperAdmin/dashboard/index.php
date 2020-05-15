<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
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
								<a href="<?= base_url('superadmin/client')?>"><h4> Total Client</h4></a>
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
							<a href="<?= base_url('superadmin/report/ambulance')?>"><h4> Statistik Sewa Ambulance</h4></a>
						</div>
						<div class="card-icon shadow-primary bg-primary">
							<i class="fas fa-archive"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total</h4>
							</div>
							<div class="card-body">
								<?= $ambulance?>
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
							<div class="card-stats-items">
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $cancel_service ?></div>
									<div class="card-stats-item-label">Gagal</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $pending_service ?></div>
									<div class="card-stats-item-label">Pending</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $success_service ?></div>
									<div class="card-stats-item-label">Sukses</div>
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
							<div class="card-body">
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
							<canvas id="statistik" height="158"></canvas>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h4>Statistik Berdasarkan Layanan</h4>
						</div>
						<div class="card-body">
							<canvas id="statistik-produk" height="158"></canvas>
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
										foreach($service7 as $row) :
										$originalDate = $row->date;
										$newDate = date("d M Y", strtotime($originalDate));?>
										<tr>
											<td><?= $no++?></td>
											<td><?= $row->no_invoice?></td>
											<td><?= $row->nama?></td>
											<td><?= $row->alamat?></td>
											<td><?= $row->phone?></td>
											<td><?= $newDate?></td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php $this->load->view('dist/_partials/footer'); ?>