<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <?php echo $title; ?>
        </div>
        <form action="<?php echo $action; ?>" method="post">
            <div class="card-body">
                <div class="form-row"> 
					<div class="form-group col-md-3">
                        <div class="header-logo">
							<a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('assets/img/denpasar-mini.png'); ?>" width="100%" alt="" class="img-responsive"></a>
						</div>
                    </div>
					<div class="form-group col-md-6">
                        <div class="header-logo">
						<p>&nbsp<p>&nbsp<p><h1 align="center">Sistem Informasi Geografi Pemetaan<br/><?php echo $iden_data['nm_website']; ?></h1>
						</div>
                    </div>
                    <div class="form-group col-md-3">
						<div class="header-logo">
							<h4 align="center">Silahkan Masukan Username dan Password anda Pada Form Dibawah Ini !!!</h4>
						</div>
						<label>Username</label>
                        <input type="text" class="form-control" name="logUser" id="logUser" placeholder="Username" required>
						<label>Password</label>
                        <input type="password" class="form-control" name="logPass" id="logPass" placeholder="Password Login" required>
						<p><p>
						<button type="submit" class="btn btn-primary">Login</button>
						<button type="reset" class="btn btn-dark">Reset</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </form>
    </div>
</div>