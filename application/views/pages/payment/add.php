<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('dist/_partials/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Data</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Data</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/payment/store') ?>" novalidate="">
                                    <div class="form-group">
                                        <label>Payment Type</label>
                                        <input type="text" class="form-control" name="payment" required="">
                                        <div class="invalid-feedback">
                                            This Field is required
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label></label>
										<div class="col-sm-12 col-md-7">
											<button type="submit" class="btn btn-primary btn-lg">Add Data</button>
										</div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>