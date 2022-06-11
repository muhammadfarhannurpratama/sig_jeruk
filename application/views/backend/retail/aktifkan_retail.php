<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Limit Retail</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Limit Stok
                            <?php echo form_error('id_limitretail') ?></label>
                        <select name="id_limitretail" id="id_limitretail" class="form-control">
                            <?php
                foreach ($retail_data as $limit){ ?>
                            <option value="<?php echo $limit->id_limitretail; ?>">
                                <?php echo $limit->limitstok; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>

            </div>
            <input type="hidden" name="id_retail" value="<?php echo $id_retail; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('Retail') ?>" class="btn btn-default">Cancel</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->