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
                            <th width="20%">Nama Retail</th>
                            <td><?php echo $retail->nama_retail; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Kecamatan</th>
                            <td><?php echo $retail->kecamatan_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Kelurahan / Desa</th>
                            <td><?php echo $retail->kelurahan_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat</th>
                            <td><?php echo $retail->lokasi_retail; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Telepon</th>
                            <td><?php echo $retail->no_hp; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Stok (Kg)</th>
                            <td><?php 
                            $stok = $retail->stok;
                            $stoklimit = $retail->limitstok;
                            $stokjual = $stok - $stoklimit; 
                            echo $stokjual; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Harga Jeruk</th>
                            <td><?php echo $retail->harga_jual; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jenis Jeruk</th>
                            <td><?php echo $retail->jeruk_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Koordinat Lahan</th>
                            <td><?php echo $retail->latitude; ?><?php echo $retail->longitude; ?></td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer">
                    <?php
                $login = $this->session->userdata('user_status');
                if($login == 'Pengguna'){ ?>
                    <a href="<?php echo base_url()?>transaksipengguna/pesan/<?php echo $retail->id_retail ?>"
                        class="btn btn-primary btn-sm">&nbsp;Beli <i class="fa fa-chevron-right"></i></a>
                    <?php
                    }?>
                    <a href="<?php echo base_url('home')?>" class="btn btn-success btn-sm"><i
                            class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-info">Foto Retail</div>
                <center>
                    <div class="card-body" id="">
                        <img width="300px" height="400px"
                            src="<?php echo base_url('assets/img/fotoretail/'.$retail->foto_retail);?>" alt="...">
                    </div>
                </center>
            </div>
        </div>