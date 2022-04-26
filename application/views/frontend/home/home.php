<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="card-body">
                        <div class="header-logo">
                            <a href="<?php echo base_url('/'); ?>"><img
                                    src="<?php echo base_url('assets/img/orange2.jpg'); ?>" width="100%" alt=""
                                    class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label>Pilih Filter</label>
                        <select name="kecamatan" id="kecamatan" class="form-control">
                            <option value="all">Pilih Kecamatan</option>
                            <?php
                           foreach ($kecamatan_data as $kecamatan) {
                              if ($kecamatan->kecamatan_id == $this->session->userdata('kecamatan')) { ?>
                            <!-- <option value="<?php echo $kecamatan->kecamatan_id; ?>" selected><?php echo $kecamatan->kecamatan_nama; ?></option>  -->
                            <?php
                                } else { ?>
                            <!--   <option value="<?php echo $kecamatan->kecamatan_id; ?>"><?php echo $kecamatan->kecamatan_nama; ?></option> -->
                            <?php 
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="card-body">
                        <center><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-filter"></i> Lihat
                                Wilayah</button>
                            <a href="<?php echo base_url('home'); ?>" class="btn btn-info btn-sm"><i
                                    class="fa fa-refresh"></i> Batal</a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-white bg-info">
                    <h4>Sistem Informasi Geografis Pemetaan Lahan Jeruk<br /><?php echo $iden_data['nm_website']; ?>
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body border-info" id="map2"></div>
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
    var myicon = '<?php echo base_url("assets/img/ico/jeruk.png"); ?>';


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
            echo ("addMarker($latitude, $longitude, '<b>$nama_pemilik</b>', '<br>$lokasi_lahan', '<br>$no_hp<br>', '<a href=\"lokasi/detail/$id_lahan\" class=\"btn btn-sm btn-info\">Detail</a>');\n");
        }
    ?>

    <?php
    foreach ($retail_data as $retail) {
            $id_retail          = $retail->id_retail;
            $nama_retail       = $retail->nama_retail;
            $kecamatan          = $retail->kecamatan_nama;
            $lokasi_retail       = $retail->lokasi_retail;
            $no_hp              = $retail->no_hp;
            $latitude           = $retail->latitude;
            $longitude          = $retail->longitude;
            $kecamatan_nama     = $retail->kecamatan_nama;
            $foto_retail     = $retail->foto_retail;
            echo ("addMarker($latitude, $longitude, '<b>$nama_retail</b>', '<br>$lokasi_retail', '<br>$no_hp<br>', '<a href=\"lokasi/detailretail/$id_retail\" class=\"btn btn-sm btn-info\">Detail</a>');\n");
        }
    ?>

    // Proses membuat marker
    function addMarker(lat, lng, info, lokasiD, phone, detil) {
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