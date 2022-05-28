<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data Petani</h3>

            <div class="text-right">
                <?php echo anchor(site_url('Lahan/create'), '<i class="fa fa-plus-square"> </i> Tambah Lahan', 'class="btn btn-primary text-light"'); ?>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo $this->session->flashdata('message');?>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Nama Pemilik Lahan</th>
                        <th>Telepon</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $start = 0;
                        foreach ($lahan_data as $lahan)
                        {
                            ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $lahan->nama_pemilik ?></td>
                        <td><?php echo $lahan->no_hp ?></td>
                        <td><?php echo $lahan->kecamatan_nama ?></td>
                        <td><?php echo $lahan->kelurahan_nama ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                                echo anchor(site_url('lahan/update/'.$lahan->id_lahan),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"'); echo ' ';
                                echo anchor(site_url('lahan/delete/'.$lahan->id_lahan),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"'); 
                                ?>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>