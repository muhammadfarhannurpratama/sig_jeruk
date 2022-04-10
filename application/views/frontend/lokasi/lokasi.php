<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('lokasi')?>">Lokasi Lahan Jeruk</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">Data List Lokasi Lahan Jeruk</div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-sm data1" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center" width="50px">No</th>
                    <th class="text-center" width="90px">Action</th>
                    <th class="text-center">Nama Pemilik</th>
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
                            <a href="<?php echo base_url('lokasi/mdetail/'.$lahan->id_lahan)?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i>&nbsp;Detail</a>
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