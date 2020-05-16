<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Data Transaksi</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
					<div class="breadcrumb-item">Data Transaksi</div>
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
													No Invoice
												</th>
												<th>Nama Pasien</th>
												<th>Alamat</th>
												<th>No Telepon</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($transaction as $data) : ?>
												<tr>
													<td><?= $data->no_invoice?></td>
													<td><?= $data->nama?></td>
													<td><?= $data->alamat?></td>
													<td><?= $data->phone?></td>
													<td>
														<div class="badges">
															<span class="badge badge-success">Success</span>
														</div>
													</td>
													<td>
														<a href="<?php echo base_url('admin/invoice/preview/').$data->id ?>" class="btn btn-warning" title="Preview Invoice"><i class="fa fa-file"></i> </a>
														<a href="<?php echo base_url('admin/invoice/download/').$data->id ?>" class="btn btn-danger" title="Print PDF"><i class="fa fa-print"></i> </a>
														<a href="<?php echo base_url('admin/invoice/detail/').$data->id ?>" class="btn btn-info" title="Detail"><i class="fa fa-eye"></i> </a>
													</td>
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