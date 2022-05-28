<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">
                Detail Pesanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>