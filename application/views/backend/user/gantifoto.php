<!-- page content -->
<div class="right_col" role="main">
    <br />
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form <small><?php echo $button ?> User</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        <form method="post" action="<?= base_url() ?>gantifoto/update_foto"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="varchar">Foto <?php echo form_error('foto_user') ?></label>
                                <input type="file" name="foto_user" class="custom-file-input" id="input-foto"
                                    aria-describedby="input-foto" accept="image/*">
                            </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>