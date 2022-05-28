<div class="col-md-12">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">List Data User</h3>

            <div class="text-right">
                <?php echo anchor(site_url('User/create'), '<i class="fa fa-plus-square"> </i> Tambah User', 'class="btn btn-primary text-light"'); ?>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo $this->session->flashdata('message');?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!--body-->
                <tbody>
                    <?php
                        $start = 0;
                        foreach ($user_data as $user)
                        {
                            ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $user->user_username ?></td>
                        <td><?php echo $user->user_namalengkap ?></td>
                        <td><?php echo $user->user_status ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('user/update/'.$user->user_id),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"'); echo ' ';
                            echo anchor(site_url('user/delete/'.$user->user_id),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"'); 
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