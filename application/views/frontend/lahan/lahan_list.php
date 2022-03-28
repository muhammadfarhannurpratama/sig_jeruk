<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <div class="row">
                <div class="col-md-4">
                    <strong><?php echo $title; ?></strong>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?php echo base_url('lahan/create') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-sm data1" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center" width="50px">No</th>
                    <th class="text-center" width="90px">Action</th>
                    <th class="text-center">Nama Pemilik Lahan</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Kelurahan/Desa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $start=0;
                foreach ($lahan_data as $lahan)
                {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo ++$start ?></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Proses
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="<?php echo base_url('lahan/update/'.$lahan->id_lahan)?>">Update</a>
                                 <a class="dropdown-item" href="<?php echo base_url('lahan/delete/'.$lahan->id_lahan)?>" onclick="javasciprt: return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')">Hapus</a>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $lahan->nama_pemilik; ?></td>
                        <td><?php echo $lahan->no_hp; ?></td>
                        <td><?php echo $lahan->kecamatan_nama; ?></td>
                        <td><?php echo $lahan->kelurahan_nama; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>