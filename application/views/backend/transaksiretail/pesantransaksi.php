<?php 
$subtotal = 0;
// $total = 0;
$jml = 0;
$kd = $this->session->userdata('kdpesan');
?>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pesan Jeruk Petani</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->session->flashdata('message');?>
                    <table class="table table-bordered" id="example1">
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
                                <td><?php echo $lahan->jumlah_panen.' Kg' ?></td>
                                <td><?php echo form_open_multipart("transaksiretail/aksi_pesan/$lahan->id_lahan");?>
                                    <!-- <form
                                            action="<?php echo base_url()?>transaksiretail/aksi_pesan/<?php echo $lahan->id_lahan ?>"
                                            method="post" enctype="multipart/form-data"> -->
                                    <input type="number" name="qty" id="qty" class="form_control"
                                        oninput="hitungtotal()" required oninput="setCustomValidity('')"
                                        value="<?= $jml?>">
                                    <input type="hidden" name="user_id" value="<?php echo $lahan->user_id ?>">
                                    <input type="hidden" name="harga" id="harga"
                                        value="<?php echo $lahan->harga_jeruk ?>">
                                    <input type="hidden" id="stok_sekarang" name="stok_sekarang"
                                        value="<?= $lahan->jumlah_panen ?>">
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

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="namaretail" class="form-control" required>
                        <input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
                        <input type="hidden" name="kdpesan" value="<?php echo $this->session->userdata('kdpesan');?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Pengiriman</label>
                        <textarea class="form-control" rows="3" name="alamat"
                            required><?php echo $this->session->userdata('alamat');?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload bukti pembayaran</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Pesan</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
function hitungtotal() {

    //menghitung max stok
    var stok_sekarang = parseInt(document.getElementById("stok_sekarang").value)
    var qty = parseInt(document.getElementById("qty").value)
    if (stok_sekarang < qty) {
        alert('stok tidak tersedia! stok tersedia : ' + stok_sekarang)
        window.location.reload();
    } else {}


    var gTotal = parseInt(document.getElementById("qty").value) * parseInt($(
            'input[name="harga"]')
        .val());

    document.getElementById("subtotal").innerHTML = gTotal;
    $('input[name="subtotal"]').val(gTotal);

    document.getElementById("total").innerHTML = gTotal;
    document.getElementById("bayar").innerHTML = gTotal;

}
</script>