<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Jeruk</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="form-group">
                <label for="varchar">Nama Jeruk <?php echo form_error('jeruk_nama') ?></label>
                <input type="text" class="form-control" name="jeruk_nama" id="jeruk_nama" placeholder="Nama Jeruk"
                    value="<?php echo $jeruk_nama; ?>" />
            </div>
            <input type="hidden" name="id_jeruk" value="<?php echo $id_jeruk; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('jeruk') ?>" class="btn btn-danger">Batal</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->