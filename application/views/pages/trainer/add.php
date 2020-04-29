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
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/trainer/store') ?>" novalidate="">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required="">
                                        <div class="invalid-feedback">
                                            What's your name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-control-label">Gender</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="2">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="1">
                                            <label class="form-check-label">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birthday</label>
                                        <input type="text" class="form-control datepicker" name="dob" required="">
                                        <div class="invalid-feedback">
                                            When's your birthday?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" required="">
                                        <div class="invalid-feedback">
                                            Where's your address?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="phone" required="">
                                            <div class="invalid-feedback">
                                                What's your phone number?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label">Status</div>
                                        <label class="custom-switch mt-2">
                                            <span class="custom-switch-description">Non Active &nbsp;</span>
                                            <input type="checkbox" name="status" 
                                                    value="1" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Active</span>
                                        </label>
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