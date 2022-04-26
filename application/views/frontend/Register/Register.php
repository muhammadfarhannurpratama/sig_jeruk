<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="assets/img/orange2.jpg" alt="sing up image"></figure>
                    <a href="home" class="signup-image-link">Kembali</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Register</h2>
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="form-control" name="user_username" id="user_user"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="form-control" name="user_pass" id="user_pass"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="NamaLengkap"><i class="zmdi zmdi-card "></i></label>
                            <input type="text" class="form-control" name="user_namalengkap" id="user_namalengkap"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Foto</label>
                            <input type="file" name="foto_user" class="custom-file-input" id="foto_user"
                                aria-describedby="input-foto" accept="image/*" required>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="register" id="register" class="form-submit" value="Register" />
                            <a href="login" class="formregister-submit">Log in</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>