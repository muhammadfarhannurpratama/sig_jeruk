<div class="right_col" role="main">
    <br />
    <div class="">

        <div class="row">
            <div class="col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rincian Data</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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

                    <?php
                $login = $this->session->userdata('user_status');
                if($login == 'Retail'){ ?>
                    <div class="card-footer">
                        <a href="<?php echo base_url()?>transaksiretail/pesan/<?php echo $lahan->id_lahan ?>"
                            class="btn btn-primary btn-sm">&nbsp;Beli <i class="fa fa-chevron-right"></i></a>
                        <a href="<?php echo base_url('Dashboard')?>" class="btn btn-success btn-sm"><i
                                class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                    </div>
                    <?php
                    }?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Foto Lahan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <center>
                        <div class="card-body" id="">
                            <img width="300px" height="400px"
                                src="<?php echo base_url('assets/img/fotolahan/'.$lahan->foto_lahan);?>" alt="...">
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>