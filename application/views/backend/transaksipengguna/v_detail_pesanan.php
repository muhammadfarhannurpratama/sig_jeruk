<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th Widht="20%">Kode Transaksi</th>
                                                <th>: <?= $detail_pesanan->kode_transaksipengguna ?></th>
                                            </tr>
                                            <tr>
                                                <th Widht="20%">Nama Pemesan</th>
                                                <th>: <?= $detail_pesanan->nama_pelanggan ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tanggal Transaksi</td>
                                                <td>: <?= $detail_pesanan->tgl_transaksi ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Bayar</td>
                                                <td>: <b><?= number_format($detail_pesanan->total_bayar ,0)?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th>Nama Retail</th>
                                                <th>Nama Jeruk</th>
                                                <th>Jumlah</th>
                                                <th>Harga </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($detail_transaksi as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->nama_retail ?></td>
                                                <td><?= $value->jeruk_nama ?></td>
                                                <td><?= $value->qty ?></td>
                                                <td>Rp. <?= number_format($value->harga,0) ?></td>
                                            </tr>
                                            <?php } ?>


                                    </table>

                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#mytable").dataTable();
});
</script>