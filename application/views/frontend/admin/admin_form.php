<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Data Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $button; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <?php echo $title; ?>
        </div>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="varchar">Username <?php echo form_error('admin_user') ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="admin_user" id="admin_user" placeholder="Username" value="<?php echo $admin_user; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="varchar">Password <?php echo form_error('admin_pass') ?></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="admin_pass" id="admin_pass" placeholder="Password" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="varchar">Nama Lengkap <?php echo form_error('admin_namalengkap') ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="admin_namalengkap" id="admin_namalengkap" placeholder="Nama Lengkap" value="<?php echo $admin_namalengkap; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="varchar">Level <?php echo form_error('admin_status') ?></label>
                    <div class="col-sm-10">
                        <?php echo form_dropdown(
                            'admin_status',
                            $option_admin_status,
                            set_value('admin_status', $admin_status),
                            'class="form-control input-sm "  id="admin_status"'
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
                <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                <a href="<?php echo site_url('admin') ?>" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>