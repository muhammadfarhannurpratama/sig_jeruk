<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Retail</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="int">Nama
                            Retail<?php echo form_error('nama_retail') ?></label>
                        <input type="text" class="form-control" name="nama_retail" id="nama_retail"
                            placeholder="Nama Retail" value="<?php echo $nama_retail; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Jalan<?php echo form_error('lokasi_retail') ?></label>
                        <input type="text" class="form-control" name="lokasi_retail" id="lokasi_retail"
                            placeholder="Lokasi Retail" value="<?php echo $lokasi_retail; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Telepon <?php echo form_error('no_hp') ?></label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Telepon"
                            value="<?php echo $no_hp; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Foto Retail
                            <?php echo form_error('foto') ?></label>
                        <input input type="file" name="foto" class="form-control" id="foto"
                            aria-describedby="input-foto" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="varchar">Berat
                            <?php echo form_error('berat') ?></label>
                        <input type="number" class="form-control" name="berat" id="berat" placeholder="Berat"
                            value="<?php echo $berat; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Stok
                            <?php echo form_error('stok') ?></label>
                        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok"
                            value="<?php echo $stok; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Pilih User
                            <?php echo form_error('user_id') ?></label>
                        <select name="user_id" id="user_id" class="form-control">
                            <?php
            foreach ($data_user as $user){ ?>
                            <option value="<?php echo $user->user_id; ?>">
                                <?php echo $user->user_id.' '.$user->user_namalengkap; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Limit Stok
                            <?php echo form_error('limitstok') ?></label>
                        <input type="number" class="form-control" name="limitstok" id="limistok"
                            placeholder="Limit Stok" value="<?php echo $limitstok; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Harga Jual
                            <?php echo form_error('harga_jual') ?></label>
                        <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                            placeholder="Harga Jual Jeruk" value="<?php echo $harga_jual; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Harga Beli
                            <?php echo form_error('harga_beli') ?></label>
                        <input type="number" class="form-control" name="harga_beli" id="harga_beli"
                            placeholder="Harga Beli Jeruk" value="<?php echo $harga_beli; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Jenis
                            Jeruk<?php echo form_error('id_jeruk') ?></label>
                        <select name="id_jeruk" id="id_jeruk" class="form-control">
                            <?php
                                            foreach ($jeruk_data as $jeruk){ ?>
                            <option value="<?php echo $jeruk->id_jeruk; ?>">
                                <?php echo $jeruk->jeruk_nama; ?></option>
                            <?php
                                            }
                                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Latitude<?php echo form_error('latitude') ?></label>
                        <input type="text" class="form-control" name="latitude" id="latitude"
                            value="<?php echo $latitude; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Longitude<?php echo form_error('lng') ?></label>
                        <input type="text" class="form-control" name="longitude" id="longitude"
                            value="<?php echo $longitude; ?>" />
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