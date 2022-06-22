<?php 
$subtotal = 0;
// $total = 0;
$jml = 0;
$no_order = date('Ymd').strtoupper(random_string('alnum', 8)) ;
?>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row ">
            <div class="col-sm-12 ">

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

                    <?php 
                        $start=0;
                        foreach ($retail_data as $retail) {
                        ?>
                    <tr>
                        <th>No Order</th>
                        <th>Nama Retail</th>
                        <th>Nama Jeruk</th>
                        <th>Stok</th>
                        <th width="100px">Jumlah</th>
                        <th>Berat</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:center">Sub-Total</th>
                    </tr>
                    <?php $i = 1; ?>
                    <tr>
                        <td>
                            <?php echo $no_order; ?>
                        </td>
                        <td>
                            <?php echo $retail->nama_retail; ?>
                        </td>
                        <td> <?php echo $retail->jeruk_nama; ?></td>
                        <td> <?php echo $retail->stok;
                            ?></td>
                        <td>
                            <!-- <td> <?php $stok = $retail->stok;
                            $stoklimit = $retail->limitstok;
                            $stokjual = $stok - $stoklimit; 
                            echo $stokjual; 
                            ?></td>
                        <td> -->
                            <form action="<?php echo base_url('transaksipengguna/checkout')?>" method="post">
                                <input type="number" name="qty" id="qty" class="form_control" oninput="hitungtotal()"
                                    required oninput="setCustomValidity('')" value="<?= $jml?>">
                                <input type="hidden" name="user_id" value="<?php echo $retail->user_id ?>">
                                <input type="hidden" name="harga" id="harga" value="<?php echo $retail->harga_jual ?>">

                                <input type="hidden" name="no_order" value="<?php echo $no_order ?>">
                                <input type="hidden" name="id" value="<?php echo $retail->id_retail ?>">
                                <input type="hidden" name="price" value="<?php echo $retail->harga_jual ?>">
                                <input type="hidden" name="name" value="<?php echo $retail->jeruk_nama ?>">
                                <?php 
                                $stok = $retail->stok;
                                echo "<input type='hidden' id='stok_sekarang' name='stok_sekarang' value='$stok'>";
                                ?>
                                <!-- <?php 
                                $stok = $retail->stok;
                                $stoklimit = $retail->limitstok;
                                $stokjual = $stok - $stoklimit;
                                echo "<input type='hidden' id='stok_sekarang' name='stok_sekarang' value='$stokjual'>";
                                ?> -->
                        </td>
                        <td class="text-center"><?= $retail->berat ?> Kg</td>
                        <td style="text-align:right">Rp. <?php echo number_format($retail->harga_jual); ?></td>
                        <td style="text-align:center">
                            <input type="hidden" id="subtotal" name="subtotal" value="<?= $subtotal?>"
                                class="form-control" readonly>
                            Rp. <?php 
                            echo $subtotal = '<b name="total" id="total"></b>';
                             ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>

                    <tr>
                        <td colspan="5">
                            <h4><strong>Total :</strong></h4>
                        </td>
                        <td colspan="4" style="text-align:center">
                            <h4><strong> Rp.
                                    <?php $total =  '<b name="total2" id="total2"></b>'; 
                                        // echo '<b>'.number_format($bayar);
                                        echo '<b>'.($total);?></strong>
                            </h4>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-info">Checkout</button>
            </div>
        </div>
        <br>
    </div>

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
    document.getElementById("total2").innerHTML = gTotal;
    document.getElementById("bayar").innerHTML = gTotal;
}
</script>