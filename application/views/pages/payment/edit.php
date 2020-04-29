<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('dist/_partials/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($payment as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/payment/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="id" value="<?= $data->PAYMENT_ID ?>">
                                        <input type="text" class="form-control" name="payment" value="<?= $data->PAYMENT_NAME ?>" required="">
                                        <div class="invalid-feedback">
                                        This Field is required
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label></label>
										<div class="col-sm-12 col-md-7">
											<button type="submit" class="btn btn-primary btn-lg">Edit Data</button>
										</div>
									</div>
                                </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>