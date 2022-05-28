<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Kecamatan</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="form-group">
                <label for="varchar">Nama Kecamatan <?php echo form_error('kecamatan_nama') ?></label>
                <input type="text" class="form-control" name="kecamatan_nama" id="kecamatan_nama"
                    placeholder="Nama Kecamatan" value="<?php echo $kecamatan_nama; ?>" />
            </div>
            <input type="hidden" name="kecamatan_id" value="<?php echo $kecamatan_id; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('Kecamatan') ?>" class="btn btn-danger">Batal</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->