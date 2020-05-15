<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permintaan Transaksi</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pilih Jenis Layanan</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Jasa Medis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Penunjang Medis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Paket HomeCare</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#alkes3" role="tab" aria-controls="contact" aria-selected="false">Peralatan Kesehatan</a>
                                    </li>
                                </ul>
                                <br>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                        <div class="row">
                                            <?php
                                            foreach($jasa_medis as $data)
                                            {
                                                echo '
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="card card-dark">
                                                        <div class="card-header">
                                                            <h4 style="font-size: 16px">'.$data->name.' '.$data->name_category .'</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>Periode : '.$data->sesi.'</p>
                                                            <p>Harga   : Rp. '.rupiah($data->harga).'</p>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <button type="button" name="add_cart" class="btn btn-primary add_cart" 
                                                            data-name="'.$data->name.' '.$data->name_category .'"
                                                            data-sesi="'.$data->sesi.'" 
                                                            data-price="'.$data->harga.'"
                                                            data-id="'.$data->id_jasa.'">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                        <div class="row">
                                            <?php
                                            foreach($penunjang_medis as $data)
                                            {
                                                echo '
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="card card-dark">
                                                        <div class="card-header">
                                                            <h4 style="font-size: 16px">'.$data->name.'</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>Periode : '.$data->sesi.'</p>
                                                            <p>Harga   : Rp. '.rupiah($data->harga).'</p>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <button type="button" name="add_cart" class="btn btn-primary add_cart" 
                                                            data-name="'.$data->name.'"
                                                            data-sesi="'.$data->sesi.'" 
                                                            data-price="'.$data->harga.'"
                                                            data-id="'.$data->id_penunjang.'">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                        <div class="row">
                                            <?php
                                            foreach($paket as $data)
                                            {
                                                echo '
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="card card-dark">
                                                        <div class="card-header">
                                                            <h4 style="font-size: 16px">'.$data->name.'</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>Harga   : Rp. '.rupiah($data->harga).'</p>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <button type="button" name="add_cart" class="btn btn-primary add_cart" 
                                                            data-name="'.$data->name.'"
                                                            data-sesi="Bulan" 
                                                            data-price="'.$data->harga.'"
                                                            data-id="'.$data->id_paket.'">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="alkes3" role="tabpanel" aria-labelledby="alkes-tab3">
                                        <div class="row">
                                        <?php
                                            foreach($alkes as $data)
                                            {
                                                echo '
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="card card-dark">
                                                        <div class="card-header">
                                                            <h4 style="font-size: 16px">'.$data->name.'</h4>
                                                        </div>
                                                        <div class="card-body">
                                                        </div>
                                                        <div class="card-footer text-center" style="margin-top: -30px">
                                                            <button type="button" name="add" class="btn btn-primary add_cart" 
                                                            data-name="'.$data->name.'"
                                                            data-price="'.$data->minggu.'"
                                                            data-sesi="Minggu"
                                                            data-id="'.$data->id_alkes.'">Mingguan</button>
                                                            
                                                            <button type="button" name="add" class="btn btn-primary add_cart" 
                                                            data-name="'.$data->name.'"
                                                            data-price="'.$data->bulan.'"
                                                            data-sesi="Bulan"
                                                            data-id="'.$data->id_alkes.'">Bulanan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" id="cart_details">
                                
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="modal fade" id="choose_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/invoice/store') ?>" method="post">
                    <div class="form-group">
                        <label for="invoice">No. Invoice</label>
                        <input id="invoice" type="text" class="form-control" value="<?= $newCode ?>" name="invoice" tabindex="1" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pilih Data Pasien</label>
                        <select class="form-control selectric" id="name" name="name" required>
                            <option value="" selected disabled>-- Choose Your Client --</option>
                            <?php
                            foreach($client as $data) : ?>
                            <option value="<?= $data->id_client?>"><?= $data->nama?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <small>Note :</small>
                        <small>Lengkapi data pasien terlebih dahulu di menu Data Client</small>
                    </div>

                    <div class="modal-footer">
                        <button type="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>