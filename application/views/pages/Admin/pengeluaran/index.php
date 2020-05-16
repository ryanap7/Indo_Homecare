<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Transaksi Pengeluaran</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
					<div class="breadcrumb-item">Transaksi Pengeluaran</div>
				</div>
			</div>
			<div class="section-body">
				<a href="<?= base_url('admin/pengeluaran/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
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
												<th>Deskripsi</th>
												<th>Nominal</th>
												<th>Tanggal</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no = 1;
												foreach($admin as $data) : 
												$originalDate = $data->date;
												$newDate = date("d M Y", strtotime($originalDate));?>
												<tr>
													<td><?= $no++?></td>
													<td><?= $data->desc?></td>
													<td>Rp. <?= rupiah($data->nominal);?></td>
													<td><?= $newDate?></td>
													<td>
														<a href="<?php echo base_url('admin/pengeluaran/edit/').$data->id_pengeluaran ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
														<a href="<?php echo base_url('admin/pengeluaran/delete/').$data->id_pengeluaran ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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