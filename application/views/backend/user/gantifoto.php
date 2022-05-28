<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ganti Foto</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            <form method="post" action="<?= base_url() ?>gantifoto/update_foto" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="varchar">Foto <?php echo form_error('foto_user') ?></label>
                    <input type="file" name="foto_user" class="form-control" id="input-foto"
                        aria-describedby="input-foto" accept="image/*">
                </div>
                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->