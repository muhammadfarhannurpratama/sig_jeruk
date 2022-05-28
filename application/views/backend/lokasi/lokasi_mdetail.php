<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Rincian Data</h3>
            <div class="text-right">
                Foto Lahan
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table-sm table-bordered">
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
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('Dashboard')?>" class="btn btn-success btn-sm"><i
                            class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                </div>
            </div>

            <div class="col-md-4">
                <table class="table-sm table-bordered">
                    <center>
                        <img width="300px" height="400px"
                            src="<?php echo base_url('assets/img/fotoretail/'.$retail->foto_retail);?>" alt="...">
                    </center>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card -->
</div>