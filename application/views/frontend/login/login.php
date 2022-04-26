<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Masuk</title>

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
                    <h2 class="form-title">Masuk</h2>
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="Username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="form-control" name="logUser" id="logUser" placeholder="Username"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="form-control" name="logPass" id="logPass"
                                placeholder="Password Login" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            <a href="register" class="formregister-submit">Register</a>
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