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
                                        <label for="varchar">Nama Kelurahan <?php echo form_error('kecamatan_nama') ?></label>
                                        <input type="text" class="form-control" name="kelurahan_nama" id="kelurahan_nama" placeholder="Nama Kelurahan" value="<?php echo $kelurahan_nama; ?>" />
                                </div>
                                <div class="form-group">
                                <label for="varchar">Nama Kecamatan <?php echo form_error('kecamatan_nama') ?></label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                    <?php
                                    foreach ($kecamatan_data as $kecamatan){ ?>
                                    <option value="<?php echo $kecamatan->kecamatan_id; ?>"><?php echo $kecamatan->kecamatan_nama; ?></option>
                                     <?php
                                    }
                                     ?>
                                    </div>
                                <input type="hidden" name="kelurahan_id" value="<?php echo $kelurahan_id; ?>" />
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('Kelurahan') ?>" class="btn btn-danger">Batal</a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                