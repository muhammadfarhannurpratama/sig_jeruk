<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data Penjualan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Detail Pesanan</th>
                        <th>Nama Retail</th>
                        <th>Alamat Pengiriman</th>
                        <th>Bukti Pembayaran</th>
                        <!-- <th>Status</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $start = 0;
                        $total = 0;
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
                        WHERE c.user_id='$id' ORDER BY a.kode_transaksiretail DESC");
                        foreach ($data_pembelian->result() as $data)
                        {
                            ?>
                    <tr>
                        <td><?php echo $data->kode_transaksiretail ?></td>
                        <td><?php echo $data->tanggal_beli ?></td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
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
                            <a href="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_pembayaran);?>">
                                <img src="<?php echo base_url('assets/img/buktibayar/'.$data->bukti_pembayaran);?>"
                                    style="height: 100px; height: 100px;">
                            </a>
                        </td>
                        <!-- <td><?php 
                                        if ($data->status_pesanan == 't') {
                                            ?><b class="badge bg-danger">Belum dikonfirmasi</b><?php
                                        } elseif ($data->status_pesanan == 'y') {
                                            ?><b class="badge bg-success">dikonfirmasi</b><?php
                                        }
                                        ?></td> -->
                        <td style="text-align:center" width="200px">
                            <?php 
                                        if ($data->status_pesanan == 't') {
                                            ?><a class="btn btn-success btn-xs"
                                href="simpan_pesanan_retail/<?php echo $data->kode_transaksiretail; ?>">Konfirmasi</a><?php
                                        } elseif ($data->status_pesanan == 'y') {
                                            ?><b>Sudah Dikonfirmasi</b><?php
                                        }?>

                        </td>
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