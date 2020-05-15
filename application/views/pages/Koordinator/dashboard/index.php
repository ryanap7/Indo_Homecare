<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-12">
					<div class="card card-statistic-2">
						<div class="card-stats">
							<div class="card-stats-title">
								Client
							</div>
						</div>
						<div class="card-icon shadow-primary bg-primary">
							<i class="fas fa-archive"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Client Active</h4>
							</div>
							<div class="card-body">
								<?= $client ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-4 col-sm-12">
					<div class="card card-statistic-2">
						<div class="card-stats">
							<div class="card-stats-title">
								Karyawan
							</div>
							<div class="card-stats-items">
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $karyawan_aktif?></div>
									<div class="card-stats-item-label">Active</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $karyawan_nonaktif?></div>
									<div class="card-stats-item-label">Non Active</div>
								</div>
							</div>
						</div>
						<div class="card-icon shadow-primary bg-primary">
							<i class="fas fa-archive"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Karyawan</h4>
							</div>
							<div class="card-body">
								<?= $karyawan?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-4 col-sm-12">
					<div class="card card-statistic-2">
						<div class="card-stats">
							<div class="card-stats-title">
								Karyawan
							</div>
							<div class="card-stats-items">
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $dokter?></div>
									<div class="card-stats-item-label">Dokter</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $perawat?></div>
									<div class="card-stats-item-label">Perawat</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $caregiver?></div>
									<div class="card-stats-item-label">Caregiver</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $bidan?></div>
									<div class="card-stats-item-label">Bidan</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $fisioterapi?></div>
									<div class="card-stats-item-label">Fisioterapi</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $okupasi?></div>
									<div class="card-stats-item-label">Okupasi Terapi</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $wicara?></div>
									<div class="card-stats-item-label">Terapi Wicara</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $akupuntur?></div>
									<div class="card-stats-item-label">Akupuntur</div>
								</div>
							</div>
						</div>
						<div class="card-icon shadow-primary bg-primary">
							<i class="fas fa-archive"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Karyawan</h4>
							</div>
							<div class="card-body">
								<?= $karyawan?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php $this->load->view('dist/_partials/footer'); ?>