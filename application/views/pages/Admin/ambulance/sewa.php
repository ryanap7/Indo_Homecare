<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sewa Ambulance</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sewa Ambulance</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/ambulance/sewa/store') ?>" novalidate="">
                                    <div class="form-group">
                                        <label>Pilih Ambulance</label>
                                        <select class="form-control selectric" id="name" name="name">
                                            <option value="" selected disabled>-- Choose Your Ambulance --</option>
                                            <?php
                                            foreach($admin as $data) : ?>
                                            <option value="<?= $data->id_ambulance?>"><?= $data->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input id="harga" type="text" class="form-control" name="harga" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Please fill in price
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