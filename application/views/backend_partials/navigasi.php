 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('Dashboard')?>" class="brand-link">
         <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->

         <span class="brand-text font-weight-bold my-2">SIG Jeruk</span>
     </a>
     <?php 
    $this->db->where('user_id',$this->session->user_id);
    $img=$this->db->get('tb_user')->row();
    ?>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?php echo base_url('assets/img/fotouser/'.$img->foto_user);?>"
                     class="img-circle elevation-2" alt="User Image" width="50px">
             </div>
             <div class="info">
                 <a href="#" class="d-block"> Welcome <?php echo $this->session->userdata('user_namalengkap')?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="<?= base_url('Dashboard') ?>"
                         class="nav-link <?php if($this->uri->segment(1)=='Dashboard' AND $this->uri->segment(2)=="" ){echo "active";} ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p> Dashboard </p>
                     </a>
                 </li>

                 <?php if ($this->session->userdata('user_status')=='Retail'): ?>
                 <li class="nav-item">
                     <a href="<?= base_url('TransaksiPengguna/pesanan_masuk')?>"
                         class="nav-link <?php if($this->uri->segment(2)== 'pesanan_masuk' AND $this->uri->segment(1) == 'TransaksiPengguna' ){echo "active";} ?>">
                         <i class="nav-icon fas fa-shopping-bag"></i>
                         <p> Pesanan Masuk </p>
                     </a>
                 </li>
                 <?php endif ?>



                 <?php if ($this->session->userdata('user_status')=='Petani' ): ?>
                 <!--nav Riwayat Transaksi-->
                 <li class="nav-item">
                     <a href="<?= base_url('RiwayatPembelianRetail/list_pesanan_retail')?>"
                         class="nav-link <?php if($this->uri->segment(1)=='RiwayatPembelianRetail' OR $this->uri->segment(2)=='list_pesanan_retail'){echo "active";} ?>">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>Riwayat Transaksi</p>
                     </a>
                 </li>
                 <?php endif ?>

                 <?php if ($this->session->userdata('user_status')=='Retail' ): ?>
                 <!--nav RiwayatPembelianRetail-->
                 <li class="nav-item">
                     <a href="<?= base_url('RiwayatPembelianRetail')?>"
                         class="nav-link <?php if($this->uri->segment(1)=='RiwayatPembelianRetail' ){echo "active";} ?>">
                         <i class="nav-icon fas fa-cart-plus"></i>
                         <p>Riwayat Pembelian</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('RiwayatPembelianPengguna')?>"
                         class="nav-link <?php if($this->uri->segment(1)=='RiwayatPembelianPengguna' ){echo "active";} ?>">
                         <i class="nav-icon fas fa-calendar"></i>
                         <p>Riwayat Penjualan</p>
                     </a>
                 </li>
                 <?php endif ?>

                 <!-- end nav RiwayatPembelianRetail-->

                 <!--nav sub bab user-->
                 <li class="nav-item has-treeview">
                     <a href=""
                         class="nav-link <?php if($this->uri->segment(1)=='User' OR $this->uri->segment(1) == 'Ganti' OR $this->uri->segment(1) == 'Gantifoto' ){echo "active";} ?>">
                         <i class="nav-icon fas fa-users"></i>
                         <p>Akun</p>
                         <i class="right fas fa-angle-left"></i>
                     </a>
                     <!--sub bab-->
                     <ul class="nav nav-treeview">
                         <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                         <li class="nav-item">
                             <a href="<?= base_url('User')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='User' ){echo "active";} ?>">
                                 <i class="nav-icon  fas fa-list"></i>
                                 <p> Daftar User</p>
                             </a>
                         </li>
                         <?php endif ?>
                         <li class="nav-item">
                             <a href="<?= base_url('Ganti')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Ganti' ){echo "active";} ?>">
                                 <i class="nav-icon fas fa-unlock-alt"></i>
                                 <p>Ubah Kata Sandi</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('Gantifoto')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Gantifoto' ){echo "active";} ?>">
                                 <i class="nav-icon fas fa-image"></i>
                                 <p>Ganti Foto</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!--end nav sub bab user-->

                 <!--nav sub bab wilayah-->
                 <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                 <li class="nav-item has-treeview">
                     <a href=""
                         class="nav-link <?php if($this->uri->segment(1)=='Kecamatan' OR $this->uri->segment(1) == 'Kelurahan' ){echo "active";} ?>">
                         <i class="nav-icon fas fa-map-marker"></i>
                         <p>Wilayah</p>
                         <i class="right fas fa-angle-left"></i>
                     </a>
                     <!--sub bab-->
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('Kecamatan')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Kecamatan' ){echo "active";} ?>">
                                 <i class="nav-icon  fas fa-circle"></i>
                                 <p>Kecamatan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('Kelurahan')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Kelurahan' ){echo "active";} ?>">
                                 <i class="nav-icon fas fa-circle"></i>
                                 <p>Kelurahan / Desa</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <?php endif ?>
                 <!--end nav sub bab wilayah-->

                 <!--nav sub bab Kelola Data-->
                 <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                 <li class="nav-item has-treeview">
                     <a href=""
                         class="nav-link <?php if($this->uri->segment(1)=='Jeruk' OR $this->uri->segment(1) == 'Lahan' OR $this->uri->segment(1) == 'Retail'){echo "active";} ?>">
                         <i class="nav-icon fas fa-tags"></i>
                         <p>Kelola Data</p>
                         <i class="right fas fa-angle-left"></i>
                     </a>
                     <!--sub bab-->
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('Jeruk')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Jeruk' ){echo "active";} ?>">
                                 <i class="nav-icon  fas fa-circle"></i>
                                 <p>Data Jeruk</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('Lahan')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Lahan' ){echo "active";} ?>">
                                 <i class="nav-icon fas fa-list"></i>
                                 <p>Data Lahan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('Retail')?>"
                                 class="nav-link <?php if($this->uri->segment(1)=='Retail' ){echo "active";} ?>">
                                 <i class="nav-icon fas fa-home"></i>
                                 <p>Data Retail</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <?php endif ?>
                 <!--end nav sub bab Kelola Data-->

                 <li class="nav-item">
                     <a data-toggle='modal' data-target='#logout' class="nav-link"><i
                             class="nav-icon fas fa-sign-out-alt"></i>
                         <p> Logout</p>
                     </a>
                 </li>

         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active"><?= $title?></li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     <!-- Main content -->
     <div class="content">
         <div class="container-fluid">
             <div class="row">

                 <!-- Modal -->
                 <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5>Logout</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 Apakah anda yakin ingin Keluar?
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                 <a href="<?= base_url('login/logout')?>" class="btn btn-success"> Iya </a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Modal -->