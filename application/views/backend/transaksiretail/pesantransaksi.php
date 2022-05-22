<?php 
$subtotal = 0;
// $total = 0;
$jml = 0;
$kd = $this->session->userdata('kdpesan');
?>

<div class="right_col" role="main">
    <br />
    <div class="">

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <input type="text" value="<?= $kd;?>"> -->
                        <h2>Pesan Jeruk Petani</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Petani</th>
                                    <th>Nama Jeruk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $start=0;
                                $data = $this->db->query("SELECT * FROM tb_lahan, tb_user , tb_jeruk where tb_lahan.id_lahan=$id Group BY tb_lahan.id_lahan DESC");
                                foreach ($data->result() as $lahan) {
                                ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $lahan->nama_pemilik ?></td>
                                    <td><?php echo $lahan->jeruk_nama ?></td>
                                    <td><?php echo $lahan->harga_jeruk ?></td>
                                    <td><?php echo $lahan->jumlah_panen.' Ton' ?></td>
                                    <td>
                                        <form
                                            action="<?php echo base_url()?>transaksiretail/aksi_pesan/<?php echo $lahan->id_lahan ?>"
                                            method="post">
                                            <input type="number" name="qty" id="qty" class="form_control"
                                                oninput="hitungtotal()" required oninput="setCustomValidity('')"
                                                value="<?= $jml?>">
                                            <input type="hidden" name="user_id" value="<?php echo $lahan->user_id ?>">
                                            <input type="hidden" name="harga" id="harga"
                                                value="<?php echo $lahan->harga_jeruk ?>">
                                    </td>
                                    <td>
                                        <input type="number" id="subtotal" name="subtotal" value="<?= $subtotal?>"
                                            class="form-control" readonly>
                                        <!-- <?php echo number_format($subtotal); ?> -->
                                    </td>
                                    <!-- <td>
                                        <button class="btn btn-primary" type="submit">Pesan</button>
                                        </form>
                                    </td> -->
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5">Total Bayar</td>
                                    <td colspan="2">
                                        <?php $total =  '<div name="total" id="total"></div>'; 
                                        // echo '<b>'.number_format($bayar);
                                        echo '<b>'.($total);
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="x_content">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="namaretail" class="form-control">
                            <input type="hidden" name="username"
                                value="<?php echo $this->session->userdata('username');?>">
                            <input type="hidden" name="kdpesan"
                                value="<?php echo $this->session->userdata('kdpesan');?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat Pengiriman</label>
                            <textarea class="form-control" rows="3"
                                name="alamat"><?php echo $this->session->userdata('alamat');?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jumlah pembayaran</label>
                            <p> <?php echo 'Total bayar : '. $bayar='<div name="bayar" id="bayar"></div>'; 
                            ?></p>
                            <input type="text" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Upload bukti pembayaran</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Pesan</button>
                        </div>
                        </form>
                    </div>
                    <!-- <?php
                $login = $this->session->userdata('user_status');
                if($login == 'Retail'){ ?>
                    <div class="card-footer">
                        <a href="transaksiretail/pembayarantransaksi/<?php echo $id; ?>/<?php echo $total; ?>"><button
                                class="btn btn-primary">Lanjutkan
                                pembayaran</button></a>
                    </div>
                    <?php
                    }?> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function hitungtotal() {
    var gTotal = parseInt(document.getElementById("qty").value) * parseInt($(
            'input[name="harga"]')
        .val());

    document.getElementById("subtotal").innerHTML = gTotal;
    $('input[name="subtotal"]').val(gTotal);

    document.getElementById("total").innerHTML = gTotal;
    document.getElementById("bayar").innerHTML = gTotal;
}
</script>