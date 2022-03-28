<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('lokasi')?>">Lokasi Lahan Jeruk</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-info"><?php echo $title; ?></div>
                <div class="card-body">
                    <table class="table table-hover table-striped table-sm">
                        <tr>
                            <th width="20%">Nama Pemilik</th>
                            <td><?php echo $lahan->nama_lahan; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Lokasi</th>
                            <td><?php echo $lahan->lokasi_lahan; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Telepon</th>
                            <td><?php echo $lahan->no_hp; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Wilayah</th>
                            <td><?php echo $lahan->kecamatan_nama; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Profile dan Jasa Expedisi</th>
                            <td><?php echo $lahan->jenis_jeruk; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('lokasi')?>" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-info">Peta Lokasi</div>
                <div class="card-body" id="map2"></div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    var map;
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var lat, lon;

    function initMap() {
        var haight = new google.maps.LatLng(37.7699298, -122.4469157);
        var oceanBeach = new google.maps.LatLng(37.7683909618184, -122.51089453697205);

        map = new google.maps.Map(document.getElementById('map2'), {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: haight,
           
        });
        //getLocation();
        //setMarkers(map);

        directionsDisplay.setMap(map);
        calcRoute(directionsService, directionsDisplay);
    }
    function setMarkers(map) {
        var alamat_kantor;
        <?php
        if(!empty($lahan->latitude)){ ?>
        alamat_kantor = new google.maps.LatLng(<?php echo $lahan->latitude; ?>, <?php echo $lahan->longitude; ?>);
        <?php
        } else { ?>
        alamat_kantor = new google.maps.LatLng(-8.658101, 115.209184);
        <?php
        }
        ?>

        var myicon = '<?php echo base_url("assets/img/ico/blue.png"); ?>';
        var marker = new google.maps.Marker({
            position: alamat_kantor,
            map: map,
            icon: myicon
        });

        var request = {
            origin:'-8.658101, 115.209184',
            destination: '-8.414589, 115.9596627',
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(result);
            }
        });


    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);
        var marker = new google.maps.Marker({
            position:latlon,
            map:map,
            title:"Posisi Anda!"
        });
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }


    function calcRoute(directionsService, directionsDisplay) {
        var request = {
            origin: haight,
            destination: oceanBeach,
        };
        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(response);
            }else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function buatJalur() {
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('map2'));

        var kasal = [lat, lon];
        var ktujuan = [<?php echo $lahan->latitude; ?>, <?php echo $lahan->longitude; ?>];
        var asal = kasal.join();
        var tujuan = ktujuan.join();

        alert(kasal);
        alert(ktujuan);

        var request = {
            origin: new google.maps.LatLng(-6.3145891999999995, 106.9596627),
            destination: new google.maps.LatLng(-6.4145891999999995, 106.9596627),
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(response);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initMap);

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB58hrOKwzUWcdyUeUqBg8Y36ofDB96JZI&callback=initMap" type="text/javascript"></script>

