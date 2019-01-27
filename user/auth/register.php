<?php require_once('../../includes/functions.php'); ?>
<?php if (isset($_SESSION['auth'])) header('Location: ../index'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semesta Rotan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme7.css">
</head>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Segera buat akun sekarang juga!</h3>
                        <p>Dapatkan lebih banyak hal dengan masuk ke platform kami.</p>
                        <div class="page-links">
                            <a href="./login">Masuk</a><a href="./register" class="active">Buat Akun</a>
                        </div>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error']; ?>
                            </div>
                        <?php } ?>
                        <form action="../../includes/app/authentication.php" method="post">
                            <input class="form-control" type="text" name="username" placeholder="Nama pengguna" autofocus="autofocus" required>
                            <input class="form-control" type="email" name="email" placeholder="Alamat e-mail" required>
                            <input class="form-control" type="password" name="password" placeholder="Kata sandi" required>
                            <input class="form-control" type="password" name="confirm" placeholder="Konfirmasi kata sandi" required>
                            <input type="hidden" name="auth" value="register">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Daftar</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span><a href="../../index">&larr; Kembali ke beranda</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php unset($_SESSION['error']); ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>