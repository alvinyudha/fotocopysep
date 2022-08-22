<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $tittle; ?>
    </title>
    <link href="assets/css/login.css" rel="stylesheet">
    <!-- Menyisipkan Bootstrap -->

    <!--CSS-->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/d7df0870cd.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat%3Awght%40400%3B500%3B600&display=swap" rel="stylesheet">



</head>

<body>
    <div class="main">
        <div class="left-side">
            <img src="assets/img/landing.png" alt="...">
        </div>
        <div class="right-side">
            <div class="container" name="back">
                <a href="website" class=""><i class="fas fa-arrow-left fa-2x"></i></a>
            </div>
            <h1 class="h4 text-gray-900 mb-4">Fotocopy SEP</h1>
            <h5 class="flashdata"><?= $this->session->flashdata('message'); ?></h5>
            <br>
            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Kata Sandi">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
            <div class="text-center2">
                <a class="small" href="<?= base_url('auth/forgotpassword') ?>">Lupa Kata Sandi?</a>
            </div>
            <div class="text-center1">
                <a class="small" href="<?= base_url('auth/registration'); ?> ">Daftar Disini</a>
            </div>

        </div>
    </div>
</body>

</html>