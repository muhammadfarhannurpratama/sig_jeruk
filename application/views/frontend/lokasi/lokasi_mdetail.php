<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('lokasi')?>">Lokasi Lahan Jeruk</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-info">Rincian Data</div>
                <div class="card-body">
                    <table class="table table-hover table-striped table-sm">
                        <tr>
                            <th width="20%">Nama Pemilik</th>
                            <td><?php echo $lahan->nama_pemilik; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Kecamatan</th>
                            <td><?php echo $lahan->kecamatan_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Kelurahan / Desa</th>
                            <td><?php echo $lahan->kelurahan_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat</th>
                            <td><?php echo $lahan->lokasi_lahan; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Telepon</th>
                            <td><?php echo $lahan->no_hp; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Luas Lahan (m2)</th>
                            <td><?php echo $lahan->luas_lahan; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jumlah Panen (Kg)</th>
                            <td><?php echo $lahan->jumlah_panen; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Harga Jeruk</th>
                            <td><?php echo $lahan->harga_jeruk; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jenis Jeruk</th>
                            <td><?php echo $lahan->jeruk_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Koordinat Lahan</th>
                            <td><?php echo $lahan->latitude; ?><?php echo $lahan->longitude; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('Dashboard')?>" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-info">Foto Lahan</div><center> 
                <div class="card-body" id="">
                <img width="300px" height="400px" src="<?php echo base_url('assets/img/fotolahan/'.$lahan->foto_lahan);?>" alt="..." >
                </div> </center>
            </div>
        </div>
        



