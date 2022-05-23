<!-- page content -->
<div class="right_col" role="main">
    <br />
    <div class="">

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Data Pembelian</h2>
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
                                    <th>Nama Retail</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $total = 0;
                                        $start = 0;
                                        $id = $this->session->userdata('user_id');
                                        $data_pembelian = $this->db->query("SELECT * FROM transaksi_retail a 
                                        JOIN keranjang_retail b ON a.kode_keranjangretail=b.kode_keranjangretail 
                                        JOIN tb_lahan c ON b.id_lahan=c.id_lahan 
                                        JOIN tb_kecamatan d ON c.kecamatan_id=d.kecamatan_id 
                                        JOIN tb_kelurahan e ON c.kelurahan_id=e.kelurahan_id 
                                        JOIN tb_user f ON c.user_id=f.user_id 
                                        JOIN tb_jeruk g ON c.id_jeruk=g.id_jeruk
                                        JOIN tb_retail h ON a.id_retail=h.id_retail
                                        JOIN tb_user i ON h.user_id=i.user_id
                                        WHERE i.user_id='$id' ORDER BY a.kode_transaksiretail DESC");
                                        foreach ($data_pembelian->result() as $data)
                                        {
                                            ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $data->kode_transaksiretail ?></td>
                                    <td><?php echo $data->tanggal_beli ?></td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Petani</th>
                                                <th>Nama Jeruk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                <td><?php
                                                echo $data->nama_pemilik; ?></td>
                                                <td><?php 
                                                echo $data->jeruk_nama; ?></td>
                                                <td><?php echo 'Rp. '.number_format($data->harga) ?></td>
                                                <td><?php echo $data->qty ?></td>
                                                <td><?php echo 'Rp. '.number_format($data->subtotal) ?></td>
                                            </tr>

                                            <?php $total = $total + $data->subtotal; ?>
                                        </table>
                                    </td>
                                    <td><?php echo $data->nama_retail ?></td>
                                    <td><?php echo $data->alamat_pengiriman ?></td>
                                    <td>
                                        <a
                                            href="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_pembayaran);?>">
                                            <img src="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_pembayaran);?>"
                                                style="height: 100px; height: 100px;">
                                    </td>
                                    <td><?php echo 'Rp. '.number_format($total); ?></td>
                                    <td><?php 
                                        if ($data->status_pesanan == 't') {
                                            ?><b>Belum dikonfirmasi</b><?php
                                        } elseif ($data->status_pesanan == 'y') {
                                            ?><b>dikonfirmasi</b><?php
                                        }
                                        ?></td>
                                    <!-- <td style="text-align:center" width="200px">
                                        <?php
                                                echo anchor(site_url('Riwayatpembelianretail/detail/'.$data->kode_transaksiretail),'<i class="fa fa-edit"></i> Detail', 'class="btn btn-success btn-xs"'); 
                                               ?>
                                    </td> -->
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