<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data Limit Stok</h3>

            <div class="text-right">
                <!-- <?php echo anchor(site_url('limitpetani/create'), '<i class="fa fa-plus-square"> </i> Tambah Limit', 'class="btn btn-primary text-light"'); ?> -->
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
                        <th>Limit Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $start = 0;
                    foreach ($limitpetani_data as $limitpetani)
                    {
                        ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $limitpetani->limitstok; ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('limitpetani/update/'.$limitpetani->id_limitpetani),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"'); echo ' ';
                            echo anchor(site_url('limitpetani/delete/'.$limitpetani->id_limitpetani),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"');
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