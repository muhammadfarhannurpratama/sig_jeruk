<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?=  $total_jeruk ?></h3>
                    <p>Data Jeruk</p>
                </div>
                <div class="icon">
                    <i class=" fas fa-clipboard-list"></i>
                </div>
                <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                <a href="<?= base_url('Jeruk') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php else: ?>
                <a href="<?= base_url('Dashboard') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?=  $total_kecamatan; ?></h3>
                    <p>Data Kecamatan </p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                </div>
                <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                <a href="<?= base_url('Kecamatan') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php else: ?>
                <a href="<?= base_url('Dashboard') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?= $total_kelurahan ?></h3>
                    <p>Data Kelurahan</p>
                </div>
                <div class="icon">
                    <i class=" nav-icon far fa-newspaper"></i>
                </div>
                <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                <a href="<?= base_url('Kelurahan') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php else: ?>
                <a href="<?= base_url('Dashboard') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $total_lahan ?></h3>
                    <p>Data Lahan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <?php if ($this->session->userdata('user_status')=='Administrator'): ?>
                <a href="<?= base_url('Lahan') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php else: ?>
                <a href="<?= base_url('Dashboard') ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                <?php endif ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-lg-12 col-12">

            <!-- MAP & BOX PANE -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lokasi Petani dan Retail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body border-info" id="map2"></div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-3 -->
    </div>
    <!-- /.row -->

</div>
<!-- /.col-lg-12 -->

<!-- /.content -->

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