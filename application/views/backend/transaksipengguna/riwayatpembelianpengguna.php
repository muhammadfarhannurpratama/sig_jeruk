<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">
                List Data Penjualan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Detail Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pengiriman</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                                        $start = 0;
                                        $total = 0;
                                        foreach ($data_pembelian as $data)
                                        {
                                            ?>
                    <tr>
                        <td><?php echo $data->kode_transaksipengguna ?></td>
                        <td><?php echo $data->tgl_transaksi ?></td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama Jeruk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td><?php 
                                                echo $data->jeruk_nama; ?></td>
                                    <td><?php echo 'Rp. '.number_format($data->harga) ?></td>
                                    <td><?php echo $data->qty ?></td>
                                    <td><?php 
                                                $subtotal = $data->harga * $data->qty;
                                                echo 'Rp. '.number_format($subtotal) ?></td>
                                </tr>

                                <?php $total = $total + $subtotal; ?>
                            </table>
                        </td>
                        <td><?php echo $data->nama_pelanggan ?></td>
                        <td><?php echo $data->alamat ?></td>
                        <td>
                            <a href="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_bayar);?>">
                                <img src="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_bayar);?>"
                                    style="height: 100px; height: 100px;">
                            </a>
                        </td>
                        <td><?php 
                                        if ($data->status_order == '0') {
                                            ?><b>Belum Bayar</b><?php
                                        } elseif ($data->status_order == '1') {
                                            ?><b>Dikemas</b><?php
                                        }elseif ($data->status_order == '2') {
                                            ?><b>Dikirim</b><?php
                                        }elseif ($data->status_order == '3') {
                                            ?><b>Selesai</b><?php
                                        }
                                        ?></td>
                    </tr>
                    <?php
                                        }
                                        ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>