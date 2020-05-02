<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Dashboard</h1>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="far fa-user"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Client</h4>
							</div>
							<div class="card-body">
								10
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-danger">
							<i class="far fa-newspaper"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Karyawan</h4>
							</div>
							<div class="card-body">
								42
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
<?php $this->load->view('dist/_partials/footer'); ?>