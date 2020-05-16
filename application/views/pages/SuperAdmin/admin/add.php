<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
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
                                <form method="post" class="needs-validation" action="<?php echo site_url('superadmin/admin/store') ?>" novalidate="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" placeholder="Enter your name" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="Enter your Email" required>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="1" placeholder="Enter your Password" required>
                                        <div class="invalid-feedback">
                                            Please fill in your Password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hak Akses</label>
                                        <select class="form-control selectric" id="role" name="role">
                                            <option value="" selected disabled>-- Choose Your Role --</option>
                                            <?php
                                            foreach($hak_akses as $data) : ?>
                                            <option value="<?= $data->id_role?>"><?= $data->role?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Foto Profile</label>
                                        <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                        <div class="invalid-feedback">
                                            Please choose your Photo
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Add Data
                                        </button>
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