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
                        <?php echo form_open_multipart($action);?>
                        <div class="form-group">
                            <label for="varchar">Password Lama <?php echo form_error('password_lama') ?></label>
                            <input type="text" class="form-control" name="password_lama" id="password_lama"
                                placeholder="Password Lama" value="" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Password Baru <?php echo form_error('password_baru') ?></label>
                            <input type="password" class="form-control" name="password_baru" id="password_baru"
                                placeholder="Password Baru" value="" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Konfirmasi Password<?php echo form_error('password_confirm') ?></label>
                            <input type="text" class="form-control" name="password_confirm" id="password_confirm"
                                placeholder="Konfirmasi Password" value="" required autofocus />
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