<!-- page content -->
<div class="right_col" role="main">

    <br />
    <div class="">

        <div class="row top_tiles">


            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="count"><?php echo  $total_kecamatan; ?></div>

                    <h3>Data Kecamatan </h3>
                    <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                    <a href="<?= base_url('Kecamatan') ?>">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php else: ?>
                    <a href="#">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php endif ?>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="count"><?php echo  $total_kelurahan; ?></div>

                    <h3>Data Kelurahan</h3>
                    <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                    <a href="<?= base_url('Kelurahan') ?>">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php else: ?>
                    <a href="#">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php endif ?>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="count"><?php echo  $total_lahan; ?></div>

                    <h3>Data Lahan</h3>
                    <a href="<?php echo base_url('Lahan') ?>">
                        <p>Terdaftar di Sistem</p>
                    </a>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="count"><?php echo  $total_jeruk; ?></div>

                    <h3>Data Jeruk</h3>
                    <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                    <a href="<?= base_url('Jeruk') ?>">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php else: ?>
                    <a href="#">
                        <p>Terdaftar di Sistem</p>
                    </a>
                    <?php endif ?>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Peta <small>Data Lahan Jeruk</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content " id="map2">

                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    function initMap() {

        var map;
        var mapOptions;
        var bounds = new google.maps.LatLngBounds();
        var infoWindow = new google.maps.InfoWindow;
        var myicon = '<?php echo base_url("assets/img/ico/jeruk2.png"); ?>';
        var myicon2 = '<?php echo base_url("assets/img/ico/retail2.png"); ?>';


        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map2'), {
            zoom: 10
            //            center: {lat: -8.405666, lng: 115.206610}
        });

        map.data.loadGeoJson("<?= base_url('geojson/Kec.semboro.geojson') ?>");
        map.data.setStyle((feature) => {
            let color = "grey";

            return /** @type {!google.maps.Data.StyleOptions} */ {
                fillColor: color,
                strokeColor: color,
                strokeWeight: 2,
            };
        });


        <?php
    foreach ($lahan_data as $lahan) {
            $id_lahan           = $lahan->id_lahan;
            $nama_pemilik       = $lahan->nama_pemilik;
            $kecamatan          = $lahan->kecamatan_nama;
            $lokasi_lahan       = $lahan->lokasi_lahan;
            $no_hp              = $lahan->no_hp;
            $latitude           = $lahan->latitude;
            $longitude          = $lahan->longitude;
            $kecamatan_nama     = $lahan->kecamatan_nama;
            $foto_lahan     = $lahan->foto_lahan;
            echo ("addMarker1($latitude, $longitude, '<b>$nama_pemilik</b>', '<br>$lokasi_lahan', '<br>$no_hp<br>', '<a href=\"lokasi/mdetail/$id_lahan\" class=\"btn btn-sm btn-info\">Detail</a>');\n");
        }
    ?>

        <?php
    foreach ($retail_data as $retail) {
            $id_retail          = $retail->id_retail;
            $nama_retail       = $retail->nama_retail;
            $lokasi_retail       = $retail->lokasi_retail;
            $no_hp              = $retail->no_hp;
            $latitude           = $retail->latitude;
            $longitude          = $retail->longitude;
            $foto_retail     = $retail->foto_retail;
            echo ("addMarker2($latitude, $longitude, '<b>$nama_retail</b>', '<br>$lokasi_retail', '<br>$no_hp<br>', '<a href=\"lokasi/mdetailretail/$id_retail\" class=\"btn btn-sm btn-info\">Detail</a>');\n");
        }
    ?>

        // Proses membuat marker
        function addMarker1(lat, lng, info, lokasiD, phone, detil) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                icon: myicon,
                position: lokasi
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info.concat(lokasiD, phone, detil));

        }

        // Proses membuat marker
        function addMarker2(lat, lng, info, lokasiD, phone, detil) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                icon: myicon2,
                position: lokasi
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info.concat(lokasiD, phone, detil));

        }


        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

    }

    google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB58hrOKwzUWcdyUeUqBg8Y36ofDB96JZI&callback=initMap"
        type="text/javascript"></script>