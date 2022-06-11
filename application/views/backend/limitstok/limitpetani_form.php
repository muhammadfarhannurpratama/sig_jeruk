<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Limit Stok</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="form-group">
                <label for="varchar">Limit Stok<?php echo form_error('limitstok') ?></label>
                <input type="text" class="form-control" name="limitstok" id="limitstok" placeholder="Limit Stok"
                    value="<?php echo $limitstok; ?>" />
            </div>
            <input type="hidden" name="id_limitpetani" value="<?php echo $id_limitpetani; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('limitpetani') ?>" class="btn btn-danger">Batal</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->