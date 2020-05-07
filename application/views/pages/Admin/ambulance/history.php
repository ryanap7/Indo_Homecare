<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>History</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
					<div class="breadcrumb-item">History</div>
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
												<th>Nama Ambulance</th>
												<th>Harga</th>
												<th>Status</th>
												<th>Tanggal Peminjaman</th>
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
													<td><?= $data->name?></td>
													<td><?= $data->harga?></td>
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
													<td><?= $newDate?></td>
													<td>
														<?php if ($data->status_peminjaman === '0') { ?>
															<a href="<?php echo base_url('admin/ambulance/sewa/update/').$data->id_ambulance ?>" class="btn btn-info" onclick="javascript: return confirm('Are you sure want to Confirm ?')" title="Konfirmasi"><i class="fa fa-check"></i></a>
														<?php } ?>
														<a href="<?php echo base_url('admin/ambulance/sewa/delete/').$data->id_sewa ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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