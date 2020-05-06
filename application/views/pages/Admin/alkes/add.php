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
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/service/alkes/store') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="name">Nama Barang</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input id="stok" type="number" class="form-control" name="stok" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your stock
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="minggu">Harga Minggu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="minggu" type="text" name="minggu" tabindex="1" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in price
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Harga Bulanan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="bulan" type="text" name="bulan" tabindex="1" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in price
                                            </div>
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