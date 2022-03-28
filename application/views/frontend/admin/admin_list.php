<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <div class="row">
                <div class="col-md-4">
                    <strong><?php echo $title; ?></strong>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?php echo base_url('admin/create') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped table-bordered table-sm data1" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center" width="50px">No</th>
                    <th class="text-center" width="90px">Action</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Level</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($admin_data as $admin)
                {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo ++$start ?></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Proses
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?php echo base_url('admin/update/'.$admin->admin_id)?>">Update</a>
<!--                                    <a class="dropdown-item" href="--><?php //echo base_url('admin/delete/'.$admin->admin_id)?><!--" onclick="javasciprt: return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')">Hapus</a>-->
                                </div>
                            </div>
                        </td>
                        <td><?php echo $admin->admin_user ?></td>
                        <td><?php echo $admin->admin_namalengkap ?></td>
                        <td class="text-center"><?php echo $admin->admin_status; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>