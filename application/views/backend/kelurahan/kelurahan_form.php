<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Kelurahan</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="form-group">
                <label for="varchar">Nama Kelurahan <?php echo form_error('kecamatan_nama') ?></label>
                <input type="text" class="form-control" name="kelurahan_nama" id="kelurahan_nama"
                    placeholder="Nama Kelurahan" value="<?php echo $kelurahan_nama; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Kecamatan <?php echo form_error('kecamatan_nama') ?></label>
                <div class="form-group">
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control input-sm">
                        <?php
                foreach ($kecamatan_data as $kecamatan){ ?>
                        <option value="<?php echo $kecamatan->kecamatan_id; ?>">
                            <?php echo $kecamatan->kecamatan_nama; ?>
                        </option>
                        <?php }?>
                </div>
            </div>
            <p>
            <div class="form-group">
                <input type="hidden" name="kelurahan_id" value="<?php echo $kelurahan_id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('Kelurahan') ?>" class="btn btn-danger">Batal</a>
            </div>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->