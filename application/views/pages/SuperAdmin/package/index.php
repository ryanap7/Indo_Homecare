<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Paket HomeCare</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="<?= base_url('superadmin/dashboard') ?>">Dashboard</a></div>
					<div class="breadcrumb-item">Paket HomeCare</div>
				</div>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="example">
										<thead>
											<tr>
												<th class="text-center">
													#
												</th>
												<th>Nama Layanan</th>
												<th>Deskripsi</th>
												<th>Harga</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no = 1;
												foreach($admin as $data) : ?>
												<tr>
													<td><?= $no++?></td>
													<td><?= $data->name?></td>
													<td><?= $data->desc?></td>
													<td>Rp. <?= rupiah($data->harga);?></td>
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php $this->load->view('dist/_partials/footer'); ?>