<!-- page content -->
<div class="right_col" role="main">
    <br />
    <div class="">

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Data Penjualan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-12">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Pesanan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Detail Pesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>di bayar</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Total Bayar</th>
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
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $data->kode_transaksipengguna ?></td>
                                    <td><?php echo $data->tgl_transaksi ?></td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Retail</th>
                                                <th>Nama Jeruk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                <td><?php
                                                echo $data->nama_retail; ?></td>
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
                                    <td><?php echo 'Rp. '.number_format($data->total_bayar) ?></td>
                                    <td>
                                        <a href="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_bayar);?>">
                                            <img src="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_bayar);?>"
                                                style="height: 100px; height: 100px;">
                                        </a>
                                    </td>
                                    <td><?php echo 'Rp. '.number_format($total); ?></td>
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