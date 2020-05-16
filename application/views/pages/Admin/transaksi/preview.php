<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
	$this->load->view('dist/_partials/header', $data);
?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Invoice</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                    <div class="breadcrumb-item">Invoice</div>
                </div>
            </div>
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title" style="margin-top: 20px">
                                    <h2 align="right">Invoice</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Logo
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Indo-Homecare</strong><br>
                                            Tax Reg No. : 1<br>
                                            +62-8119-777-934<br>
                                            indohomecare@gmail.com<br>
                                            Jl. Pd. Kopi Raya No.71. Duren Sawit. Jakarta Timur.<br>
                                            13460<br>
                                            www.indohomecare.com
                                        </address>
                                    </div>
                                </div>
                                <hr style="border:0;border-style: inset;border-top: 3px solid #ddd; margin-top: 10px">
                            </div>
                        </div>
                        <div class="row" style="margin-top:-18px">
                            <div class="col-md-9">
                                <?php
								foreach($client as $data) : ?>
                                <strong>DITAGIHKAN KEPADA</strong><br>
                                <?= $data->nama?><br>
                                <?= $data->phone?>
                            </div>
                            <div class="col-md-3 text-md-right">
                                <div class="row">
                                    <div class="col-md-6 text-md-left">
                                        <strong>INVOICE #</strong> <br>
                                        <strong>Tanggal</strong> <br>
                                        <strong>Jatuh Tempo</strong> 
                                    </div>
                                    <div class="col-md-6">        
                                        <?= $data->no_invoice?><br>
                                        <?php
                                            $originalDate = $data->date;
                                            $newDate = date("d M Y", strtotime($originalDate));
                                            echo $newDate;
                                        ?><br>
                                        <?php
                                            $originalDate = $data->date_expired;
                                            $newDate = date("d M Y", strtotime($originalDate));
                                            echo $newDate;

                                        ?>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <thead>
                                            <tr>
                                                <th>Jasa</th>
                                                <th class="text-center">Periode</th>
                                                <th class="text-right">Harga</th>
                                                <th class="text-right">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no =1;
                                                $subtotal = 0;
												foreach($invoice as $data) : ?>
                                            <tr>
                                                <td width="60%"><?= $data->nama_layanan?></td>
                                                <td class="text-center"><?= $data->periode?></td>
                                                <td class="text-right">Rp. <?= rupiah($data->harga);?></td>
                                                <td class="text-right">Rp. <?= rupiah($data->harga);?></td>
                                            </tr>
                                            <?php
                                            $subtotal += $data->harga;
                                            endforeach;?>
                                        </tbody>
                                    </table>
                                    <hr style="border:0;border-style: inset;border-top: 3px solid #ddd; margin-top: 10px">
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Rp. <?= rupiah($subtotal)?></div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Rp. <?= rupiah($subtotal)?></div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border:0;border-style: inset;border-top: 3px solid #ddd; margin-top: 10px" align="right" width="420px">
                                <div class="row">
                                    <div class="col-lg-10 text-right">
                                    <?php
								    foreach($client as $data) : ?>
                                        <div class="invoice-detail-item">
                                            <?php
                                                $originalDate = $data->date;
                                                $newDate = date("d M Y", strtotime($originalDate));
                                            ?>
                                            <div class="invoice-detail-name">Lunas pada tanggal <?= $newDate?></div>
                                        </div>
                                    <?php endforeach;?>
                                    </div>
                                    <div class="col-lg-2 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Rp. <?= rupiah($subtotal)?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="col-6" style="background-color: #ddd; height: 70px;font-weight:bold; padding:10px; padding-top:25px">
                                                <strong>Jumlah yang Harus Dibayar</strong>
                                            </div>
                                            <div class="col-5" style="background-color: #ddd; height: 70px;font-weight:bold; padding:10px; padding-top:25px">
                                                <strong>Rp. 0</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                    </div>
                                    <div class="col-lg-5 text-right mt-2">
                                        <h1 style="font-size: 46px;color: red">Lunas</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-left mt-4">
                                        <strong style="font-weight: bold">CATATAN</strong><br>
                                        (i) Seluruh Pembayaran Sudah Termasuk Admin dan Garansi Pergantian Jasa Homecare (All in) <br>
                                        (ii) Proses Pembayaran dilakukan diawal saat kandidat telah tiba dilokasi direkening instruksi pembayaran diatas.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 text-center" style="margin-top: 80px">
                                        Senang Dapat Membantu Keluarga Yang Anda Cintai
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 text-left mt-4">
                                        <strong>Persyaratan Layanan</strong><br>
                                        Jasa tenaga homecare tidak diperkenankan untuk melakukan tuga URT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>