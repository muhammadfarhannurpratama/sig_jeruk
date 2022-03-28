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
            <input type="text" name="ketinggian" class="form-control" placeholder="Nilai antara 0-350" required="true">
            </div>
            <div class="form-group">
            <label for="varchar">Suhu </label>
            <input type="text" name="suhu" class="form-control" placeholder="Nilai antara 0-50" required="true">
            </div>
            <div class="form-group">
            <label for="varchar">Curah Hujan</label>
            <input type="text" name="curah_hujan" class="form-control" placeholder="Nilai antara 0-3600" required="true">
            </div>
            <div class="form-group">
            <label for="varchar">Ph Tanah </label>
            <input type="text" name="ph_tanah" class="form-control" placeholder="Nilai antara 0-16" required="true">
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
                url : site_url+'pencarian/prosesFuzzy',
                data : $('#form-rekomendasi').serialize(),
                dataType : 'json',
                success: function (response) {
                    if (response.success) {
                        window.location.href = site_url+'pencarian/result';
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