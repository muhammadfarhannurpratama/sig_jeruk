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
                                        <label for="varchar">Nama Jeruk <?php echo form_error('jeruk_nama') ?></label>
                                        <input type="text" class="form-control" name="jeruk_nama" id="jeruk_nama" placeholder="Nama Jeruk" value="<?php echo $jeruk_nama; ?>" />
                                    </div>
                                  
                                    <input type="hidden" name="id_jeruk" value="<?php echo $id_jeruk; ?>" />
                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    <a href="<?php echo site_url('jeruk') ?>" class="btn btn-danger">Batal</a>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>