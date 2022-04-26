            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Data Retail</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-6">
                                        <form action="<?php echo $action; ?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="int">Nama
                                                    Retail<?php echo form_error('nama_retail') ?></label>
                                                <input type="text" class="form-control" name="nama_retail"
                                                    id="nama_retail" placeholder="Nama Retail"
                                                    value="<?php echo $nama_retail; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Kecamatan
                                                    <?php echo form_error('kecamatan_id') ?></label>
                                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                                    <?php
                                            foreach ($kecamatan_data as $kecamatan){ ?>
                                                    <option value="<?php echo $kecamatan->kecamatan_id; ?>">
                                                        <?php echo $kecamatan->kecamatan_nama; ?></option>
                                                    <?php
                                            }
                                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Kelurahan/Desa
                                                    <?php echo form_error('kecamatan_id') ?></label>
                                                <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                                    <?php
                                            foreach ($kelurahan_data as $kelurahan){ ?>
                                                    <option value="<?php echo $kelurahan->kelurahan_id; ?>">
                                                        <?php echo $kelurahan->kelurahan_nama; ?></option>
                                                    <?php
                                            }
                                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="varchar">Jalan<?php echo form_error('lokasi_retail') ?></label>
                                                <input type="text" class="form-control" name="lokasi_retail"
                                                    id="lokasi_retail" placeholder="Lokasi Retail"
                                                    value="<?php echo $lokasi_retail; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Telepon <?php echo form_error('no_hp') ?></label>
                                                <input type="text" class="form-control" name="no_hp" id="no_hp"
                                                    placeholder="Telepon" value="<?php echo $no_hp; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Foto Retail
                                                    <?php echo form_error('foto') ?></label>
                                                <input input type="file" name="foto" class="custom-file-input" id="foto"
                                                    aria-describedby="input-foto" accept="image/*">
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="varchar">Luas Lahan (m2)
                                                    <?php echo form_error('luas_lahan') ?></label>
                                                <input type="number" class="form-control" name="luas_lahan"
                                                    id="luas_lahan" placeholder="Luas Lahan"
                                                    value="<?php echo $luas_lahan; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="varchar">Jumlah Panen (Kg)
                                                    <?php echo form_error('jumlah_panen') ?></label>
                                                <input type="number" class="form-control" name="jumlah_panen"
                                                    id="jumlah_panen" placeholder="Jumlah Panen"
                                                    value="<?php echo $jumlah_panen; ?>" />
                                            </div> -->

                                            <div class="form-group">
                                                <label for="varchar">Harga Jeruk
                                                    <?php echo form_error('harga_jual') ?></label>
                                                <input type="number" class="form-control" name="harga_jual"
                                                    id="harga_jual" placeholder="Harga Jeruk"
                                                    value="<?php echo $harga_jual; ?>" />
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
                                                <label
                                                    for="varchar">Latitude<?php echo form_error('latitude') ?></label>
                                                <input type="text" class="form-control" name="latitude" id="latitude"
                                                    value="<?php echo $latitude; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Longitude<?php echo form_error('lng') ?></label>
                                                <input type="text" class="form-control" name="longitude" id="longitude"
                                                    value="<?php echo $longitude; ?>" />
                                            </div>
                                            <input type="hidden" name="id_retail" value="<?php echo $id_retail; ?>" />
                                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                            <a href="<?php echo site_url('Retail') ?>"
                                                class="btn btn-default">Cancel</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="map2"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <script type="text/javascript">
                var map;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map2'), {
                        zoom: 11,
                        //center: {lat: -8.134969, lng: 113.224538}
                        center: {
                            lat: -8.1782771,
                            lng: 113.372462
                        }

                    });
                    setMarkers(map);

                    var input = document.getElementById('kupva_alamat');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                }

                function setMarkers(map) {

                    var myicon = '<?php echo base_url("assets/img/ico/jeruk.png"); ?>';
                    var marker = new google.maps.Marker({
                        <?php
            if(!empty($latitude)){ ?>
                        position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                        <?php
            }
            else { ?>
                        // position : {lat: -8.134969, lng: 113.224538},
                        position: {
                            lat: -8.1782771,
                            lng: 113.372462
                        },

                        <?php
            }
            ?>
                        map: map,
                        icon: myicon,
                        draggable: true
                    });

                    google.maps.event.addDomListener(window, 'load', initMap);

                    google.maps.event.addListener(marker, 'drag', function() {
                        updateMarkerPosition(marker.getPosition());
                    });

                }

                function updateMarkerPosition(latLng) {
                    document.getElementById('latitude').value = [latLng.lat()]
                    document.getElementById('longitude').value = [latLng.lng()]
                }
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB58hrOKwzUWcdyUeUqBg8Y36ofDB96JZI&callback=initMap"
                    type="text/javascript"></script>