<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Detail Transaksi</h1>
				<div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="<?= base_url('admin/transaksi') ?>">Data transaksi</a></div>
					<div class="breadcrumb-item">Detail transaksi</div>
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
                                                <th>Nama jasa</th>
                                                <th>Qty</th>
                                                <th>harga</th>
                                                <th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                                $no = 1;
                                                $total = 0;
                                                foreach ($this->cart->contents() as $items) : 
                                                $subtotal = $data->qty * $data->price;
                                                $total += $subtotal;
                                            ?>
												<tr>
													<td><?= $no++?></td>
													<td><?= $items['name'] ?></td>
                                                    <td><?= $items['qty'] ?>
                                                    <td>Rp <?= number_format($items['price'], 0, ',','.')?></td>
                                                    <td>Rp <?= number_format($subtotal, 0, ',','.')?></td>
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