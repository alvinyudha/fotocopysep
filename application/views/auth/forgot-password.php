<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $tittle; ?>
    </title>
    <!--CSS-->
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
        }

        .main {
            position: relative;
            height: 500px;
            width: 700px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            text-align: center;
            border-radius: 10px;
        }

        .main .container {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #ffffff;
            border-radius: 10px;
        }

        .main .container h1 {
            margin: 90px 0 30px;
        }

        .form-group input {
            margin: 0 21px 10px 0;
            width: 250px;
            height: 40px;
            border-radius: 8px;
            background: transparent;
            border: 1px solid #dddddd;
            padding-left: 45px;
            font-size: 14px;
            letter-spacing: .5px;
            outline-color: #1a99ee;
        }

        .text-center {
            font-size: 13px;
            margin: 10px;
            height: 15px;
            letter-spacing: .2px;
        }

        @media (max-width: 810px) {
            .main {
                width: 400px;
            }

            .main .container {
                width: 100%;
                filter: brightness(1);
            }
        }

        form .form-group i {
            transform: translateX(35px);
        }

        form button {
            cursor: pointer;
            background: #1a99ee;
            color: #f1f1f1;
            width: 300px;
            height: 45px;
            font-size: 17px;
            font-weight: 500;
            letter-spacing: .5px;
            border-radius: 3px;
            transition: .4s;
        }

        form button:hover {
            background: #198edb;
        }

        .error-message {
            text-align: start;
            color: #cc0033;
            font-size: 12px;
            padding-left: 205px;


        }

        .flashdata {
            color: red;
        }
    </style>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat%3Awght%40400%3B500%3B600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="main">
        <div class="container">
            <h1>Lupa Kata Sandi</h1>
            <h5 class="flashdata"><?= $this->session->flashdata('message'); ?></h5>
            <br>
            <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                <div class="form-group">
                    <h5 class="error-message"><?= form_error('email'); ?></h5>
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                </div>
                <h5 class="error-message"><?= form_error('password1'); ?></h5>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                </button>
            </form>
            <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Kembali ke Login</a>
            </div>
        </div>

    </div>



</body>

</html>