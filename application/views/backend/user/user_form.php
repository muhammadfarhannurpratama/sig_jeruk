<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('user_username') ?></label>
                <input type="text" class="form-control" name="user_username" id="user_user" placeholder="username"
                    value="<?php echo $user_username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('user_pass') ?></label>
                <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password"
                    value="" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Lengkap <?php echo form_error('user_namalengkap') ?></label>
                <input type="text" class="form-control" name="user_namalengkap" id="user_namalengkap"
                    placeholder="nama_lengkap" value="<?php echo $user_namalengkap; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Foto Pengguna
                    <?php echo form_error('foto_user') ?></label>
                <input input type="file" name="foto_user" class="form-control" id="foto_user"
                    aria-describedby="input-foto" accept="image/*">
            </div>
            <div class="form-group">
                <label for="varchar">Level <?php echo form_error('user_status') ?></label>
                <div class="form-group">
                    <?php echo form_dropdown('user_status',$option_user_status,set_value('user_status', $user_status),
                    'class="form-control input-sm "  id="usrt_status"'
                    ); ?>
                </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('User') ?>" class="btn btn-danger">Batal</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->