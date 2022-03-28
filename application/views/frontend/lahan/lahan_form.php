<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('lahan')?>">lahan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $button; ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-white bg-info">
            <?php echo $title; ?>
        </div>
        <form action="<?php echo $action; ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Pemilik Lahan<?php echo form_error('nama_pemilik') ?></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Pemilik Lahan" value="<?php echo $nama_pemilik; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Lokasi <?php echo form_error('lokasi_lahan') ?></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="lokasi_lahan" id="lokasi_lahan" placeholder="Lokasi" value="<?php echo $lokasi_lahan; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Telepon <?php echo form_error('no_hp') ?></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Phone" value="<?php echo $no_hp; ?>" />
                    </div>
                    <label class="col-md-2 col-form-label">Wilayah<?php echo form_error('kecamatan_id') ?></label>
                    <div class="col-md-4">
                        <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                            <?php
                            foreach ($kecamatan_data as $kecamatan){ ?>
                                <option value="<?php echo $kecamatan->kecamatan_id; ?>"><?php echo $kecamatan->kecamatan_nama; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Fasilitas <?php echo form_error('jenis_jeruk') ?></label>
                    <div class="col-md-10">
                        <textarea name="jenis_jeruk" id="myeditor" rows="10" class="form-control" placeholder="Fasilitas"><?php echo $jenis_jeruk; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Latitude <?php echo form_error('latitude') ?></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
                    </div>
                    <label class="col-md-2 col-form-label">Longitude <?php echo form_error('longitude') ?></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id_lahan" value="<?php echo $id_lahan; ?>" />
                <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                <a href="<?php echo site_url('bengkel') ?>" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <br>
    <div class="card">
        <div class="card-header text-white bg-info">Peta</div>
        <div class="card-body" id="map2"></div>
    </div>
</div>

<script type="text/javascript">
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map2'), {
            zoom: 11,
            //center: {lat: -8.134969, lng: 113.224538}
            center: {lat: -8.1782771, lng: 113.372462}
            
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
            position : new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
            <?php
            }
            else { ?>
            //position: {lat: -8.134969, lng: 113.224538},
            center: {lat: -8.1782771, lng: 113.372462},
            
            <?php
            }
            ?>
            map: map,
            icon: myicon,
            draggable : true
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB58hrOKwzUWcdyUeUqBg8Y36ofDB96JZI&callback=initMap" type="text/javascript"></script>

