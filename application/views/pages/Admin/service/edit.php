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
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/service/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="name">Nama Layanan</label>
                                        <input type="hidden" name="id" value="<?= $data->id_jasa ?>">
                                        <input id="name" type="text" class="form-control" name="name" value="<?= $data->name ?>" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control selectric" id="category" name="category">
                                            <option value="" selected disabled>-- Choose Category --</option>
                                            <option 
												<?php if($data->id_category == '1') : echo 'selected'; ?><?php endif; ?> 
												value="1">Umum
                                            </option>
											<option 
												<?php if($data->id_category == '2') : echo 'selected'; ?><?php endif; ?> 
												value="2">Ahli
                                            </option>
                                            <option 
												<?php if($data->id_category == '3') : echo 'selected'; ?><?php endif; ?> 
												value="3">ICU
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Deskripsi</label>
                                        <textarea class="summernote-simple" name="desc" required=""><?= $data->desc ?></textarea>
                                        <div class="invalid-feedback">
                                            Please fill in your Address
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <select class="form-control selectric" id="period" name="period">
                                            <option value="" selected disabled>-- Choose Period --</option>
                                            <option 
												<?php if($data->sesi == 'Minggu') : echo 'selected'; ?><?php endif; ?> 
												value="Minggu">Minggu
                                            </option>
											<option 
												<?php if($data->sesi == 'Bulan') : echo 'selected'; ?><?php endif; ?> 
												value="Bulan">Bulan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="bulan" type="text" name="bulan" tabindex="1" value="<?= $data->harga ?>" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in price
                                            </div>
                                        </div>
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