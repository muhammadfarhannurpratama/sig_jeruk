<!-- page content -->
<div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List Data Kelurahan</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-6">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo anchor(site_url('Kelurahan/create'), '<i class="fa fa-plus-square"> </i> Tambah Kelurahan', 'class="btn btn-primary"'); ?>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Id Kecamatan</th>
                                                <th>Nama Kelurahan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($kelurahan_data as $kelurahan)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $kelurahan->kecamatan_id ?></td>
                                                <td><?php echo $kelurahan->kelurahan_nama ?></td>
                                                <td style="text-align:center" width="200px">
                                                <?php 
                                                echo anchor(site_url('Kelurahan/update/'.$kelurahan->kelurahan_id),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"'); 
                                                echo anchor(site_url('Kelurahan/delete/'.$kelurahan->kelurahan_id),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"'); 
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <script type="text/javascript">
                        $(document).ready(function () {
                            $("#mytable").dataTable();
                        });
                </script>