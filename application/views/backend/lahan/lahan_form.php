<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Lahan Petani</h3>
        </div>
        <!--card body-->
        <div class="card-body">
            <?php echo $this->session->flashdata('check'); ?>
            <?php echo form_open_multipart($action);?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="int">Nama Pemilik
                            Lahan<?php echo form_error('nama_pemilik') ?></label>
                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik"
                            placeholder="Pemilik Lahan" value="<?php echo $nama_pemilik; ?>" />
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
                        <label for="varchar">Jalan<?php echo form_error('lokasi_lahan') ?></label>
                        <input type="text" class="form-control" name="lokasi_lahan" id="lokasi_lahan"
                            placeholder="Lokasi Lahan" value="<?php echo $lokasi_lahan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Telepon <?php echo form_error('no_hp') ?></label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Telepon"
                            value="<?php echo $no_hp; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Foto Lahan <?php echo form_error('foto') ?></label>
                        <input input type="file" name="foto" class="form-control" id="foto"
                            aria-describedby="input-foto" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="varchar">Pilih User
                            <?php echo form_error('user_id') ?></label>
                        <select name="user_id" id="user_id" class="form-control">
                            <?php
                                foreach ($data_user as $user){ ?>
                            <option value="<?php echo $user->user_id; ?>">
                                <?php echo $user->user_id.' '.$user->user_namalengkap; ?></option>
                            <?php
                                            }
                                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Luas Lahan (m2)
                            <?php echo form_error('luas_lahan') ?></label>
                        <input type="number" class="form-control" name="luas_lahan" id="luas_lahan"
                            placeholder="Luas Lahan" value="<?php echo $luas_lahan; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Jumlah Panen (Kg)
                            <?php echo form_error('jumlah_panen') ?></label>
                        <input type="number" class="form-control" name="jumlah_panen" id="jumlah_panen"
                            placeholder="Jumlah Panen" value="<?php echo $jumlah_panen; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Harga Jeruk
                            <?php echo form_error('harga_jeruk') ?></label>
                        <input type="number" class="form-control" name="harga_jeruk" id="harga_jeruk"
                            placeholder="Harga Jeruk" value="<?php echo $harga_jeruk; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Tanggal Panen
                            <?php echo form_error('tanggal_panen') ?></label>
                        <input type="date" class="form-control" name="tanggal_panen" id="tanggal_panen"
                            placeholder="Tanggal Panen" value="<?php echo $tanggal_panen; ?>" />
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
                        <label for="varchar">Latitude<?php echo form_error('latitude') ?></label>
                        <input type="text" class="form-control" name="latitude" id="latitude"
                            value="<?php echo $latitude; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Longitude<?php echo form_error('lng') ?></label>
                        <input type="text" class="form-control" name="longitude" id="longitude"
                            value="<?php echo $longitude; ?>" />
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_lahan" value="<?php echo $id_lahan; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('Lahan') ?>" class="btn btn-default">Cancel</a>
            <?= form_close()?>
        </div>
        <!--end card body-->
    </div>
</div>
<!--end div halaman add-->

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