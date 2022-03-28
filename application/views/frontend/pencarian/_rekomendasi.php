<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('rekomendasi')?>">Rekomendasi Lahan Jeruk</a></li>
        </ol>
    </nav>
    <form id="form-rekomendasi">
        <div class="card">
            <div class="card-header text-white bg-info">Rekomendasi Penentuan Lahan Jeruk</div>
            <div class="card-body">
            <div class="form-group">
            <label for="varchar">Ketinggian </label>
            <select class="form-control" name="ketinggian" required="" aria-label="ketinggian">
                <option disabled="disabled" selected="selected" value="">Silahkan Pilih</option>
                <option value="ketinggian_max">Tinggi (350 - 2000 MDPL )</option>
                <option value="ketinggian_min">Rendah ( <=350 MDPL )</option>
            </select>
            </div>
            <div class="form-group">
            <label for="varchar">Suhu </label>
            <select class="form-control" name="suhu" required="" aria-label="suhu">
                <option disabled="disabled" selected="selected" value="">Silahkan Pilih</option>
                <option value="suhu_max">Panas (25 - 50 )</option>
                <option value="suhu_min">Dingin ( <= 25 )</option>
            </select>
            </div>
            <div class="form-group">
            <label for="varchar">Curah Hujan</label>
            <select class="form-control" name="curah_hujan" required="" aria-label="curah_hujan">
                <option disabled="disabled" selected="selected" value="">Silahkan Pilih</option>
                <option value="hujan_max">Tinggi (2400 - 3600  mm/tahun)</option>
                <option value="hujan_mid">Menengah ( 1200 - 2400 mm/tahun )</option>
                <option value="hujan_min">Rendah ( <=1200 mm/tahun )</option>
            </select>
            </div>
            <div class="form-group">
            <label for="varchar">Ph Tanah </label>
            <select class="form-control" name="ph_tanah" required="" aria-label="ph_tanah">
                <option disabled="disabled" selected="selected" value="">Silahkan Pilih</option>
                <option value="tanah_max">Tinggi (7 - 14)</option>
                <option value="tanah_mid">Menengah (5 - 10)</option>
                <option value="tanah_min">Rendah ( <= 7 )</option>
            </select>
            </div>
            <input type="hidden" name="" value="" />
            <button type="submit" class="btn btn-primary">Hasil</button> 
            <a href="<?php echo site_url('Rekomendasi') ?>" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript">
    var site_url = '<?php echo site_url() ?>';
    $(function() {
        $('#form-rekomendasi').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type : 'ajax',
                method : 'post',
                url : site_url+'rekomendasi/cekRekomendasi',
                data : $('#form-rekomendasi').serialize(),
                dataType : 'json',
                success: function (response) {
                    if (response.success) {
                        window.location.href = site_url+'rekomendasi/result';
                    }else{
                        alert('Proses Gagal!');
                    }
                },
                error: function(xmlresponse) {
                    console.log(xmlresponse);
                }
            })
        })
    })
</script>