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
                                <th width="20%">Nama Retail</th>
                                <td><?php echo $retail->nama_retail; ?></td>
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
                                <th width="20%">Stok</th>
                                <td><?php echo $retail->stok; ?></td>
                            </tr>
                            <tr>
                                <th width="20%">Berat</th>
                                <td><?php echo $retail->berat; ?></td>
                            </tr>
                            <tr>
                                <th width="20%">Limit Stok</th>
                                <td><?php echo $retail->limitstok; ?></td>
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
                        <a href="<?php echo base_url('Dashboard')?>" class="btn btn-success btn-sm"><i
                                class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                    </div>
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
                                src="<?php echo base_url('assets/img/fotoretail/'.$retail->foto_retail);?>" alt="...">
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>