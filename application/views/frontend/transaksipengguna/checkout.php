<!-- Main content -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fas fa-check"></i>','</h5></div>');
    ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">

            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Order</th>
                            <th>Qty</th>
                            <th>Nama Barang</th>
                            <th>Berat</th>
                            <th style="text-align:right">Harga</th>
                            <th style="text-align:right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>

                        <?php 
                        $tot_berat = 0;
                        foreach ($this->cart->contents() as $items) {
                        $berat = $items['qty'] * $retail->berat;
                        $tot_berat = $tot_berat + $berat;
                    ?>
                        <tr>
                            <td><?php echo $no_order; ?></td>
                            <td><?php echo $items['qty']; ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td style="text-center"><?= $berat ?> Kg</td>
                            <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['price']); ?>
                            </td>
                            <td style="text-align:right">Rp.
                                <?php echo $this->cart->format_number($items['subtotal']); ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <form action="<?php echo base_url('transaksipengguna/checkout_pesanan')?>" method="post">
            <?php 
            $no_order = date('Ymd').strtoupper(random_string('alnum', 8)) ;
            ?>
            <div class="row">
                <input type="hidden" name="user_id" value="<?php echo $user->user_id ?>">
                <!-- accepted payments column -->
                <div class="col-sm-8 invoice-col">
                    <h5><b> Tujuan Pengiriman : </b></h5>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" class="form-control" required></select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select name="kota" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Expedisi</label>
                                <select name="expedisi" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tarif</label>
                                <select name="paket" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input name="kode_pos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap"
                                    value="<?php echo $user->user_namalengkap ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nomer Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" placeholder="Telepon"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Grand Total:</th>
                                <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                            </tr>
                            <tr>
                                <th>Berat:</th>
                                <td><?= $tot_berat ?> Kg</td>
                            </tr>
                            <tr>
                                <th>Ongkos Kirim:</th>
                                <td><label id="ongkir"></label></td>
                            </tr>
                            <tr>
                                <th>Total Harga:</th>
                                <td><label id="total_bayar"></label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.row -->

    <!-- Menyimpan Transaksi -->
    <input name="no_order" value="<?= $no_order ?>" type="hidden">
    <input name="estimasi" type="hidden">
    <input name="ongkir" type="hidden">
    <input name="berat" value="<?= $tot_berat?>" type="hidden">
    <input name="grand_total" value="<?= $this->cart->total() ?>" type="hidden">
    <input name="total_bayar" type="hidden">
    <!-- End Menyimpan Transaksi -->
    <!-- Simpan Detail Transaksi -->
    <?php
    $i = 1;
    foreach ($this->cart->contents() as $items) {
        echo form_hidden('qty'.$i++, $items['qty']);
    }
    ?>
    <!-- End Simpan Detail Transaksi -->
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-dark"></i> Buat Pesanan
            </button>
        </div>
    </div>
    </form>
</div>

<script src="<?= base_url()?>assets/jquery.min.js"></script>
<script>
//data provinsi
$(document).ready(function() {
    $.ajax({
        type: "post",
        url: "<?= base_url('rajaongkir/provinsi') ?>",

        success: function(hasil_provinsi) {
            //console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
            console.log(hasil_provinsi);
        }
    });
    //masukan data kota berdasarkan provinsi terpilih
    $("select[name=provinsi]").on("change", function() {
        //ambil id provinsi yang dipilih dari atribut pribasi
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
            type: "post",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil_kota) {
                $("select[name=kota]").html(hasil_kota);
            }
        });
    });
    $("select[name=kota]").on("change", function() {
        $.ajax({
            type: "post",
            url: "<?= base_url('rajaongkir/expedisi') ?>",
            success: function(hasil_expedisi) {
                $("select[name=expedisi]").html(hasil_expedisi);
            }
        });
    });
    //mendapatkan data paket
    $("select[name=expedisi]").on("change", function() {
        //mendapatkan ekpedisi terpilih
        var expedisi_terpilih = $("select[name=expedisi]").val()
        //mendapatkan kota tujuan terpilih
        var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
        //mengambil data ongkir berdasarkan berat produk
        var total_berat = <?= $tot_berat ?>;
        $.ajax({
            type: "post",
            url: "<?= base_url('rajaongkir/paket') ?>",
            data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih +
                '&berat=' + total_berat,
            success: function(hasil_paket) {
                $("select[name=paket]").html(hasil_paket);
                //  console.log(hasil_paket);
            }
        });
    });

    $("select[name=paket]").on("change", function() {
        //menampilkan ongkir ke label
        var dataongkir = $("option:selected", this).attr('ongkir');
        var reverse = dataongkir.toString().split('').reverse().join(''),
            ribuan_ongkir = reverse.match(/\d{1,3}/g);
        ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');

        $("#ongkir").html("Rp." + ribuan_ongkir);
        //menghitung total bayar
        var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
        var reverse = data_total_bayar.toString().split('').reverse().join(''),
            ribuan_total = reverse.match(/\d{1,3}/g);
        ribuan_total = ribuan_total.join('.').split('').reverse().join('');
        $("#total_bayar").html("Rp." + ribuan_total);

        //estimasi dan ongkir
        var estimasi = $("option:selected", this).attr('estimasi');
        $("input[name=estimasi]").val(estimasi);
        $("input[name=ongkir]").val(dataongkir);
        $("input[name=total_bayar]").val(data_total_bayar);
    });

});
</script>
<br>
<br><br><br>