<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Data Karyawan</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="<?= base_url('koordinator/dashboard') ?>">Dashboard</a></div>
					<div class="breadcrumb-item">Data Karyawan</div>
				</div>
			</div>
			<div class="section-body">
				<a href="<?= base_url('koordinator/employees/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="form-group col-2">
										<label>Filter by Profesi</label>
										<select class="form-control selectric" id="filter_profesi" name="profesi">
											<option value="0" selected>-- Show All --</option>
											<?php
                                            foreach($profesi as $data) : ?>
                                            <option value="<?= $data->id_profesi?>"><?= $data->nama_bagian?></option>
                                            <?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-striped" id="karyawan">
										<thead>
											<tr>
												<th class="text-center">
													#
												</th>
												<th>Nama</th>
												<th>ID Karyawan</th>
												<th>Profesi</th>
												<th>No.Telepon</th>
												<th>Alamat</th>
												<th>Status</th>
												<th>Foto</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody></tbody>
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