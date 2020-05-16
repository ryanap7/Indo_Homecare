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
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form method="post" class="needs-validation" action="<?php echo site_url('admin/report/print_pengeluaran') ?>" novalidate="">
									<div class="row">
										<div class="form-group col-2">
											<label>Filter by Bulan</label>
											<select class="form-control selectric" id="filter4" name="bulan">
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
										</div>
										<div class="form-group" style="margin-top: 30px">
                                        	<button type="submit" class="btn btn-danger" tabindex="4">
											<i class="fa fa-print"></i>
                                            Print Laporan
											</button>
										</div>
									</div>	
                                </form>
								<div class="table-responsive">
									<table class="table table-striped" id="index">
										<thead>
											<tr>
												<th class="text-center">
													#
												</th>
												<th>Deskripsi</th>
												<th>Nominal</th>
												<th>Tanggal</th>
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