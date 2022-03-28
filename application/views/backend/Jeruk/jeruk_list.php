<!-- page content -->
<div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List Data Jeruk</h2>
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
                                            <?php if ($this->session->userdata('admin_status')=='Administrator'): ?>
                                                <?php echo anchor(site_url('jeruk/create'), '<i class="fa fa-plus-square"> </i> Tambah Jeruk', 'class="btn btn-primary"'); ?>

                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Nama Jeruk</th>
                                                <?php if ($this->session->userdata('admin_status')=='Administrator'): ?>
                                                    <th>Action</th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($jeruk_data as $jeruk)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $jeruk->jeruk_nama ?></td>
                                                <?php if ($this->session->userdata('admin_status')=='Administrator'): ?>
                                                    <td style="text-align:center" width="200px">
                                                    <?php
                                                    echo anchor(site_url('jeruk/update/'.$jeruk->id_jeruk),'<i class="fa fa-edit"></i> Update', 'class="btn btn-warning btn-xs"');
                                                    echo anchor(site_url('jeruk/delete/'.$jeruk->id_jeruk),'<i class="fa fa-trash"></i> Delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Untuk Menghapus ?\')"');
                                                    ?>
                                                    </td>
                                                <?php endif ?>
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