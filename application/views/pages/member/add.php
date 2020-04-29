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
                <form method="post" class="needs-validation" action="<?php echo site_url('admin/member/store') ?>" novalidate="">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Member</h4>
                                </div>
                                <div class="card-body">
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
                                        <label>Membership</label>
                                        <select class="form-control selectric" id="membership" onchange="cek_database()">
                                            <option value="" selected disabled>-- Choose Your Membership --</option>
                                            <?php
                                            foreach($membership as $data) : ?>
                                            <option value="<?= $data->MEMBERSHIP_ID?>"><?= $data->MEMBERSHIP_NAME?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary btn-lg">Add Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Date</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $date       = date('d-m-Y');
                                                $expired    = date('d-m-Y', strtotime("+30 day", strtotime(date("d-m-Y"))));
                                            ?>
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <input type="text" class="form-control" name="registration" value="<?= $date ?>" required="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Expired Date</label>
                                                <input type="text" class="form-control" name="registration" value="<?= $expired ?>" required="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control" name="price" required="" id="price">
                                                <div class="invalid-feedback">
                                                    This Field is required
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Registration Fee</label>
                                                <input type="number" class="form-control" name="fee" required="">
                                                <div class="invalid-feedback">
                                                    This Field is required
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="number" class="form-control" name="total" required="">
                                                <div class="invalid-feedback">
                                                    This Field is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>