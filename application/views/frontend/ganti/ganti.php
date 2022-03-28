<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <strong><?php echo $title; ?></strong>
        </div>
        <div class="card-body">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

            <div class="row">
                <div class="col-md-7">
                    <form action="<?php echo $action; ?>" class="form-horizontal" method="post">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Password Lama <?php echo form_error('password_lama') ?></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama" value="" required autofocus />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Password Baru <?php echo form_error('password_baru') ?></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru" value="" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Konfirmasi Password <?php echo form_error('password_confirm') ?></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Konfirmasi Password" value="" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right"></label>
                            <div class="col-sm-8">
                                <input type="hidden" name="admin_id" value="<?php echo $this->session->userdata('admin_id');; ?>" />
                                <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    Cara ganti password User: <br>
                    <ol>
                        <li>Masukkan password lama pada kolom Password Lama</li>
                        <li>Masukkan password baru pada kolom password baru</li>
                        <li>Masukkan passowrd baru kembali pada kolom Kofirmasi Password</li>
                        <li>Tekan tombol Update Password</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

</div>
