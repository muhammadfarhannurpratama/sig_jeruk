<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-home"></i> <?php echo $iden_data['alamat']; ?></li>
                <li class="list-group-item"><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $iden_data['email_website']; ?>"><?php echo $iden_data['email_website']; ?></a></li>
                <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo $iden_data['no_telp1']; ?></li>
            </ul>
			<p>
        <form action="<?php echo $action;?>" method="POST" class="form-horizontal form-wizzard">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="name-group" class="form-group">
                                    <input type="text" name="nama" id="name" class="form-control" placeholder="Enter your name ..."/>
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="surname-group" class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Masukan E-Mail Anda..."/>
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="phone-group" class="form-group">
                                    <input type="text" name="subjek" class="form-control" placeholder="Subject..."/>
                                    <?php echo form_error('subjek') ?>
                                </div>
                            </div>
                        </div>
                        <div id="comment-group" class="form-group">
                            <textarea rows="5" name="pesan" class="form-control" placeholder="Pesan Anda..."></textarea>
                        </div>
                        <div  id="comment-group" class="form-group text-center">
                            <?php echo $captcha // tampilkan recaptcha ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Kirim Pesan</button>
                        </div>
        </form>
		</div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
					<div class="card-header text-white bg-info">Peta Lokasi</div>
					<div class="card-body">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.5764287816305!2d113.22059624129503!3d-8.144528925594203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667915cff1379%3A0x8a65d49aad568375!2zOMKwMDgnNDAuMyJTIDExM8KwMTMnMTkuNyJF!5e0!3m2!1sen!2sid!4v1613975198059!5m2!1sen!2sid" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>	
                </div>
            </div>
        </div>
    </div>
</div>

<script async defer src="" type="text/javascript"></script>