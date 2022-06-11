<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Daftar Retail</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <!-- Sing in  Form -->
    <section class="sign-in">
        <h2 class="form-titleretail">Mendaftar Retail</h2>
        <div class="container">
            <div class="signin-content">

                <div class="signup-formretail1">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_retail"><i class="zmdi zmdi-home"></i></label>
                            <input type="text" class="form-control" name="nama_retail" id="nama_retail"
                                placeholder="Nama Retail" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="lokasi_retail"><i class="zmdi zmdi-pin"></i></label>
                            <input type="text" class="form-control" name="lokasi_retail" id="lokasi_retail"
                                placeholder="Lokasi Retail" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><i class="zmdi zmdi-card-sim "></i></label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Hp"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="latitude"><i class="zmdi zmdi-map "></i></label>
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="longitude"><i class="zmdi zmdi-map "></i></label>
                            <input type="text" class="form-control" name="longitude" id="longitude"
                                placeholder="Longitude" required autocomplete="off">
                        </div>
                        <!-- <div class="form-group">
                            <label for="varchar">Foto</label>
                            <input type="file" name="foto_user" class="custom-file-input" id="foto_user"
                                aria-describedby="input-foto" accept="image/*" required>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="registerretail" id="register" class="form-submit"
                                value="Register" />
                            <a href="login" class="formregister-submit">Log in</a>
                            <a href="home" class="form-kembali">Home</a>
                        </div>
                </div>
                <div class="signup-formretail1">
                    <div class="form-group">
                        <label for="Username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" class="form-control" name="user_username" id="user_user"
                            placeholder="Username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" class="form-control" name="user_pass" id="user_pass"
                            placeholder="Password" required autocomplete="off">
                    </div>
                    <!-- <div class="form-group">
                        <label for="NamaLengkap"><i class="zmdi zmdi-card "></i></label>
                        <input type="text" class="form-control" name="user_namalengkap" id="user_namalengkap"
                            placeholder="Nama Lengkap" required autocomplete="off">
                    </div> -->
                    <div class="form-group">
                        <label for="varchar">Foto</label>
                        <input type="file" name="foto_retail" class="custom-file-input" id="foto_retail"
                            aria-describedby="input-foto" accept="image/*" required>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>


    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>