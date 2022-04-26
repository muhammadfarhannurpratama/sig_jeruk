<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <center><a href="#" class="site_title"><span>SIG Jeruk</span></a></center>
                    </div>
                    <div class="clearfix"></div>
                    <?php 
                    $this->db->where('user_id',$this->session->user_id);
                    $img=$this->db->get('tb_user')->row();
                    ?>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('assets/img/fotouser/'.$img->foto_user);?>" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Selamat Datang,</span>
                            <h2>
                                <?php echo $this->session->userdata('user_namalengkap');?>
                                </a></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <br><br><br><br>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?php echo base_url('Dashboard')  ?>">
                                        <i class="fa fa-tachometer"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-users"></i> Akun <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                                        <li><a href="<?php echo base_url('User')  ?>">Daftar User</a>
                                        </li>
                                        <?php endif ?>
                                        <li><a href="<?php echo base_url('Ganti')  ?>">Ubah Kata Sandi</a>
                                        </li>
                                        <li><a href="<?php echo base_url('Gantifoto')  ?>">Ganti Foto</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if ($this->session->userdata('user_status')=='Administrator' || $this->session->userdata('user_status')=='Petani' ): ?>
                                <li><a><i class="fa fa-map-marker"></i> Wilayah <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('Kecamatan')  ?>">Kecamatan</a>
                                        </li>
                                        <li><a href="<?php echo base_url('Kelurahan')  ?>">Kelurahan / Desa</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-tags"></i> Kelola Data <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('Jeruk')  ?>">Data Jeruk</a>
                                        </li>
                                        <li><a href="<?php echo base_url('Lahan')  ?>">Data Lahan</a>
                                        </li>
                                        <li><a href="<?php echo base_url('Retail')  ?>">Data Retail</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif ?>

                                <!-- RiwayatTransaksi admin dan petani -->
                                <?php if ($this->session->userdata('user_status')=='Administrator' || $this->session->userdata('user_status')=='Petani' ): ?>
                                <li>
                                    <a href="<?php echo base_url('RiwayatTransaksi')  ?>">
                                        <i class="fa fa-tachometer"></i>Riwayat Transaksi</a>
                                </li>
                                <?php endif ?>

                                <!-- RiwayatTransaksi retail -->
                                <?php if ($this->session->userdata('user_status')=='Retail'): ?>
                                <li>
                                    <a href="<?php echo base_url('RiwayatTransaksi')  ?>">
                                        <i class="fa fa-tachometer"></i>Riwayat Transaksir</a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?php echo base_url('assets/img/fotouser/'.$img->foto_user);?>" alt="">
                                    <span class=" fa fa-angle-down"> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <!-- <li><a href="#"> Profile</a>
                                    </li> -->
                                    <li><a href="<?php echo base_url('login/logout'); ?>"><i
                                                class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation">
                                <a href="<?php echo base_url('Home') ?>"><i class="fa fa-share-square-o"></i> Situs </a>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->