<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><i class="fa fa-home"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home'); ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('lokasi'); ?>">Lokasi Lahan</a></li>
                <!--   <li class="nav-item"><a class="nav-link" href="<?php echo base_url('pencarian'); ?>">Rekomendasi Lahan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('kontak'); ?>">Kontak Kami</a></li> -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                $login = $this->session->userdata('user_status');
                if($login == 'Pengguna'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->session->userdata('user_namalengkap'); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('ganti'); ?>">Ganti Password</a>
                    </div>
                </li>
                <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-danger btn-sm">
                    <i class="fa fa-lock logout-icon"></i> Keluar</a>
                <?php
                    }else { ?>
                <a href="<?php echo base_url('login'); ?>"
                    class="btn btn-warning btn-sm <?php if($this->uri->segment(4) == 'login'){ echo 'active';} ?>">
                    Masuk</a>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>