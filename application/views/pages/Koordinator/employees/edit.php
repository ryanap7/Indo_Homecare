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
                                <?php foreach ($employees as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('koordinator/employees/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="hidden" name="id" value="<?= $data->id_employee ?>">
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $data->name ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input id="nip" type="number" class="form-control" name="nip" tabindex="1" value="<?= $data->nip ?>" required>
                                        <div class="invalid-feedback">
                                            Please fill in your NIP
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Profesi</label>
                                        <select class="form-control selectric" id="profesi" name="profesi">
                                            <option value="" selected disabled>-- Choose Your Profession --</option>
                                            <option 
												<?php if($data->id_profesi == '1') : echo 'selected'; ?><?php endif; ?> 
												value="1">Dokter
                                            </option>
											<option 
												<?php if($data->id_profesi == '2') : echo 'selected'; ?><?php endif; ?> 
												value="2">Perawat
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '3') : echo 'selected'; ?><?php endif; ?> 
												value="3">Caregiver
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '4') : echo 'selected'; ?><?php endif; ?> 
												value="4">Bidan
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '5') : echo 'selected'; ?><?php endif; ?> 
												value="5">Fisioterapi
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '6') : echo 'selected'; ?><?php endif; ?> 
												value="6">Okupasi Terapi
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '7') : echo 'selected'; ?><?php endif; ?> 
												value="7">Terapi Wicara
                                            </option>
                                            <option 
												<?php if($data->id_profesi == '8') : echo 'selected'; ?><?php endif; ?> 
												value="8">Akupuntur
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" value="<?= $data->email ?>" required>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">No Telepon</label>
                                        <input id="telp" type="number" class="form-control" name="telp" tabindex="1" value="<?= $data->phone ?>" required>
                                        <div class="invalid-feedback">
                                            Please fill in your Phone Number
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" required=""><?= $data->address ?></textarea>
                                        <div class="invalid-feedback">
                                            Please fill in your Address
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label">Status</div>
                                        <label class="custom-switch mt-2">
                                            <span class="custom-switch-description">Non Active &nbsp;</span>
                                            <input type="checkbox" name="status" value="1" class="custom-switch-input" <?php if($data->status == '1') : echo 'checked'; ?><?php endif; ?>>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Active</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Foto Karyawan</label>
                                        <br>
                                        <img src="<?= base_url('assets/img/employees/').$data->img?>" alt="" style="margin-left: 40px;margin-bottom: 10px;width: 100px; border-radius: 50%">
                                        <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                        <small>Kosongkan jika tidak ingin dirubah</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Periode Kontrak</label>
                                        <input type="text" class="form-control datepicker" name="date" value="<?= $data->date ?>" required="">
                                        <div class="invalid-feedback">
                                            Please choose your Date
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Add Data
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