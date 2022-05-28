<div class="col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="5b" data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                        aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                        aria-selected="false">Dikemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                        href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                        aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                        href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                        aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <!-- Pesanan Masuk -->
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                    aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th>Tanggal</th>
                            <th>No.Order</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
                        <tr>
                            <td><?= $value->tgl_transaksi ?></td>
                            <td><?= $value->kode_transaksipengguna ?></td>

                            <td>
                                <b><?= $value->expedisi ?></b> <br>
                                Paket : <?= $value->paket ?> <br>
                                Ongkir : <?= number_format($value->ongkir ,0)?>
                            </td>
                            <td>
                                <b>Rp.<?= number_format($value->total_bayar,0 )?></b> <br>

                                <?php if ($value->status_bayar == 0) { ?>
                                <span class="badge badge-warning bg-warning">Belum Bayar</span>
                                <?php } else { ?>
                                <span class="badge badge-success">Sudah Bayar</span> <br>
                                <span class="badge badge-primary">Menunggu Verifikasi</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value->status_bayar == 1) { ?>
                                <a href="<? base_url('transaksipengguna/cek') ?>"
                                    class="btn btn-sm btn-success btn-flat" data-toggle="modal"
                                    data-target="#cek<?= $value->kode_transaksipengguna ?>">Cek
                                    Bukti
                                    Bayar</a>
                                <a href="<?= base_url('transaksipengguna/detail_pesanan/'.$value->kode_transaksipengguna) ?>"
                                    class="btn btn-sm btn-flat btn-primary">Detail Pemesanan</a>
                                <a href="<?= base_url('transaksipengguna/proses/'.$value->kode_transaksipengguna) ?>"
                                    class="btn btn-sm btn-flat btn-primary">Proses</a>
                                <?php } ?>

                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

                <!-- Pesanan Dikemas -->
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                        <tr>
                            <td><?= $value->kode_transaksipengguna ?></td>
                            <td><?= $value->tgl_transaksi ?></td>
                            <td>
                                <b><?= $value->expedisi ?></b> <br>
                                Paket : <?= $value->paket ?> <br>
                                Ongkir : <?= number_format($value->ongkir ,0)?>
                            </td>
                            <td>
                                <b>Rp.<?= number_format($value->total_bayar,0 )?></b> <br>
                                <b> <span class="badge badge-primary">Dikemas/Diproses</span></b>

                            </td>
                            <td>
                                <?php if ($value->status_bayar == 1) { ?>

                                <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal"
                                    data-target="#kirim<?= $value->kode_transaksipengguna ?>"><i
                                        class="fa fa-paper-plane"></i> Kirim</button>
                                <?php } ?>

                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

                <!-- Pesanan Dikirim -->
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th>No. Resi</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                        <tr>
                            <td><?= $value->kode_transaksipengguna ?></td>
                            <td><?= $value->tgl_transaksi ?></td>
                            <td>
                                <b><?= $value->expedisi ?></b> <br>
                                Paket : <?= $value->paket ?> <br>
                                Ongkir : <?= number_format($value->ongkir ,0)?>
                            </td>
                            <td>
                                <b>Rp.<?= number_format($value->total_bayar,0 )?></b> <br>
                                <b> <span class="badge badge-success">Dikirim</span></b>

                            </td>
                            <td>
                                <h4> <?= $value->no_resi ?></h4>
                            </td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>

                <!-- Pesanan Selesai -->
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th>No. Resi</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                        <tr>
                            <td><?= $value->kode_transaksipengguna ?></td>
                            <td><?= $value->tgl_transaksi ?></td>
                            <td>
                                <b><?= $value->expedisi ?></b> <br>
                                Paket : <?= $value->paket ?> <br>
                                Ongkir : <?= number_format($value->ongkir ,0)?>
                            </td>
                            <td>
                                <b>Rp.<?= number_format($value->total_bayar,0 )?></b> <br>
                                <b> <span class="badge badge-success">Diterima/Sampai</span></b>

                            </td>
                            <td>
                                <h4> <?= $value->no_resi ?></h4>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- modal cek Bukti pembayaran -->
<?php foreach ($pesanan as $key => $value) { ?>
<div class="modal fade" id="cek<?= $value->kode_transaksipengguna ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $value->kode_transaksipengguna ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nama Bank</th>
                        <th>:</th>
                        <th><?= $value->nama_bank?></th>
                    </tr>

                    <tr>
                        <th>No. Rekening</th>
                        <th>:</th>
                        <th><?= $value->no_rek?></th>
                    </tr>

                    <tr>
                        <th>Atas Nama</th>
                        <th>:</th>
                        <th><?= $value->atas_nama?></th>
                    </tr>

                    <tr>
                        <th>Total Pembayaran</th>
                        <th>:</th>
                        <th>Rp. <?= number_format($value->total_bayar,0)?></th>
                    </tr>
                </table>

                <img class="img-fluid pad" src="<?= base_url('assets/img/buktibayar/'.$value->bukti_bayar) ?>" alt="">
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>


<?php foreach ($pesanan_diproses as $key => $value) { ?>
<div class="modal fade" id="kirim<?= $value->kode_transaksipengguna ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $value->kode_transaksipengguna ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('transaksipengguna/kirim/'.$value->kode_transaksipengguna) ?>
                <table class="table">
                    <tr>
                        <th>Expedisi</th>
                        <th>:</th>
                        <th><?= $value->expedisi ?></th>
                    </tr>
                    <tr>
                        <th>Paket</th>
                        <th>:</th>
                        <th><?= $value->paket ?></th>
                    </tr>
                    <tr>
                        <th>Ongkir</th>
                        <th>:</th>
                        <th>Rp. <?= number_format($value->ongkir,0) ?></th>
                    </tr>
                    <tr>
                        <th>No. Resi</th>
                        <th>:</th>
                        <th><input name="no_resi" class="form-control" placeholder="No. Resi" required></th>
                    </tr>
                </table>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>