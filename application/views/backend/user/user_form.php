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
                                        <label for="varchar">Username <?php echo form_error('admin_user') ?></label>
                                        <input type="text" class="form-control" name="admin_user" id="admin_user" placeholder="username" value="<?php echo $admin_user; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Password <?php echo form_error('admin_pass') ?></label>
                                        <input type="password" class="form-control" name="admin_pass" id="admin_pass" placeholder="Password" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nama Lengkap <?php echo form_error('admin_namalengkap') ?></label>
                                        <input type="text" class="form-control" name="admin_namalengkap" id="admin_namalengkap" placeholder="nama_lengkap" value="<?php echo $admin_namalengkap; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Level <?php echo form_error('admin_status') ?></label>
                                        <div class="form-group">
                                        <?php echo form_dropdown(
                                        'admin_status',
                                        $option_admin_status,
                                        set_value('admin_status', $admin_status),
                                        'class="form-control input-sm "  id="admin_status"'
                                        ); ?>
                                        </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    <a href="<?php echo site_url('User') ?>" class="btn btn-danger">Batal</a>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>