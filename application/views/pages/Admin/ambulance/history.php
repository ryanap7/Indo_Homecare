<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
						<div class="form-group col-2">
							<label>Filter by Bulan</label>
							<select class="form-control selectric historyfilter" id="filterhistorybulan" name="">
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
						<div class="form-group col-2">
							Tahun
							<select class="form-control selectric historyfilter" name="tahun" id="filterhistorytahun">
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
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="historyambulance">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Nama Client</th>
											<th>Nama Ambulance</th>
											<th>Harga</th>
											<th>Status</th>
											<th>Tanggal Peminjaman</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody> </tbody>
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