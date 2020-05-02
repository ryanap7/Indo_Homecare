<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
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
                                <?php foreach ($admin as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('superadmin/admin/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="hidden" name="id" value="<?= $data->id_auth ?>">
                                        <input id="name" type="text" class="form-control" name="name" value="<?= $data->name ?>" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="<?= $data->email ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your new Password" tabindex="1">
                                        <small>Kosongkan jika tidak ingin dirubah</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Hak Akses</label>
                                        <select class="form-control selectric" id="role" name="role">
                                            <option 
												<?php if($data->role == '1') : echo 'selected'; ?><?php endif; ?> 
												value="1">Superadmin
                                            </option>
											<option 
												<?php if($data->role == '2') : echo 'selected'; ?><?php endif; ?> 
												value="2">Administrasi
                                            </option>
                                            <option 
												<?php if($data->role == '3') : echo 'selected'; ?><?php endif; ?> 
												value="3">Direksi
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Ganti Foto Profile</label>
                                        <br>
                                        <img src="<?= base_url('assets/img/avatar/').$data->img?>" alt="" style="margin-left: 40px;margin-bottom: 10px;width: 100px; border-radius: 50%">
                                        <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                        <small>Kosongkan jika tidak ingin dirubah</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Edit Data
                                        </button>
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