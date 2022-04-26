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
                        <?php echo $this->session->flashdata('check'); ?>
                        <?php echo form_open_multipart($action);?>
                        <div class="form-group">
                            <label for="varchar">Username <?php echo form_error('user_username') ?></label>
                            <input type="text" class="form-control" name="user_username" id="user_user"
                                placeholder="username" value="<?php echo $user_username; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Password <?php echo form_error('user_pass') ?></label>
                            <input type="password" class="form-control" name="user_pass" id="user_pass"
                                placeholder="Password" value="" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama Lengkap <?php echo form_error('user_namalengkap') ?></label>
                            <input type="text" class="form-control" name="user_namalengkap" id="user_namalengkap"
                                placeholder="nama_lengkap" value="<?php echo $user_namalengkap; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Foto Pengguna
                                <?php echo form_error('foto_user') ?></label>
                            <input input type="file" name="foto_user" class="custom-file-input" id="foto_user"
                                aria-describedby="input-foto" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="varchar">Level <?php echo form_error('user_status') ?></label>
                            <div class="form-group">
                                <?php echo form_dropdown(
                                        'user_status',
                                        $option_user_status,
                                        set_value('user_status', $user_status),
                                        'class="form-control input-sm "  id="usrt_status"'
                                        ); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('User') ?>" class="btn btn-danger">Batal</a>
                    </form>


                </div>
            </div>
        </div>
    </div>

</div>