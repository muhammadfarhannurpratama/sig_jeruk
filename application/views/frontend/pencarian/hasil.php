<div class="container">''
    <?php
    foreach ($rekomendasi as $rows) :
        $array[] = $rows['persentase'];
    endforeach;
    foreach ($rekomendasi as $rows) :
        if($rows['persentase'] == max($array)) {
            $nameBanana = $rows['jeruk'];
        }
    endforeach;
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('lokasi') ?>">Hasil Rekomendasi Lahan Jeruk</a></li>
        </ol>
    </nav>
    <div class="card mb-5">

        <div class="card-header text-white bg-info">Hasil Rekomendasi</div>
        <div class="card-body">
            Score Hasil dari perhitungan adalah  <b>
                <h3 class='text text-success'> <br><?= $nameBanana ?>
            </b> / <?= max($array) ?> % </h3>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-white bg-info">Rekomendasi Lahan Jeruk</div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" width="50px">No</th>
                        <th class="text-center" width="90px">Action</th>
                        <th class="text-center">Jenis Jeruk</th>
                        <th class="text-center">Derajat Keanggotaan</th>
                        <th class="text-center">Persentase (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rekomendasi as $rows) : ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><a href="#" class="btn btn-sm btn-info">Lihat Lahan</a></td>
                            <td><?php echo $rows['jeruk'] ?></td>
                            <td><?php echo $rows['bobot'] ?></td>
                            <td><?php echo $rows['persentase'] ?></td>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
        <button class="btn btn-info" type="button" id="btn-reset">Ulang Perhitungan</button>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript">
    var site_url = '<?php echo site_url() ?>';
    $(function() {
        $('#btn-reset').click(function() {
            if (confirm('Apakah anda yakin akan mengulang perhitungan lagi?')) {
                window.location.href = site_url+'pencarian';
            }
        })
    })
</script>