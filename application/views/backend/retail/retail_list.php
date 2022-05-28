<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data Retail</h3>

            <div class="text-right">
                <?php echo anchor(site_url('Retail/create'), '<i class="fa fa-plus-square"> </i> Tambah Retail', 'class="btn btn-primary text-light"'); ?>
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
                        <th>Nama Retail</th>
                        <th>Telepon</th>
                        <th>Stok</th>
                        <th>Limit Stok</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $start = 0;
                        foreach ($retail_data as $retail)
                        {
                            ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $retail->nama_retail ?></td>
                        <td><?php echo $retail->no_hp ?></td>
                        <td><?php echo $retail->stok ?></td>
                        <td><?php echo $retail->limitstok ?></td>
                        <td><?php echo $retail->harga_jual ?></td>
                        <td><?php echo $retail->harga_beli ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('retail/update/'.$retail->id_retail),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"'); echo ' ';
                            echo anchor(site_url('retail/delete/'.$retail->id_retail),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"'); 
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