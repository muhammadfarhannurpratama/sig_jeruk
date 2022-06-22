<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data Limit Stok</h3>
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
                        <th>Limit Stok</th>
                        <th>Sisa Limit</th>
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
                        <td><?php echo $retail->nama_retail; ?></td>
                        <td><?php echo $limitstok; ?></td>
                        <td><?php 
                        $sisastok = $limitstok - $retail->stok ;
                        echo $sisastok; ?></td>
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