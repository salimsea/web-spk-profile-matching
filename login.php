<?php
session_start();

if (isset($_SESSION['id_user'])) {
    header("Location: ./index.php");
    die();
}

include "koneksi.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SPK - Profile Matching</title>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/9f2ac9fd56.js"></script>
    <script src="js/bootstrap-password-toggler.js" type="text/javascript"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="d-flex justify-content-center bg-info">
    <div class="text-center bg-white p-4">
        <?php
        if (isset($_REQUEST['login'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $sql = mysqli_query($koneksi, "SELECT id_user, username, nama FROM master_user WHERE username='$username' AND password=MD5('$password')");
            $cek = mysqli_num_rows($sql);

            if ($cek > 0) {
                list($id_user, $username, $nama) = mysqli_fetch_array($sql);
                $_SESSION['id_user'] = $id_user;
                $_SESSION['username'] = $username;
                $_SESSION['nama'] = $nama;

                header("Location: ./home.php");
                die();
            } else {
                $_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
                header('Location: ./');
                die();
            }
        } else {
        ?>
            <form class="form-signin" method="post" action="" role="form">
                <?php
                if (isset($_SESSION['err'])) {
                    $err = $_SESSION['err'];
                    echo '<div class="alert alert-warning alert-message">' . $err . '</div>';
                    unset($_SESSION['err']);
                }
                ?>
                <h1 class="h4 mb-3 font-weight-normal">SPK - Profile Matching</h1>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="input" id="inputUsername" name="username" class="form-control" placeholder="Username" required value="admin" autofocus>
                <span>&nbsp;</span>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" data-toggle="password" placeholder="Password" value="admin" required>
                <span>&nbsp;</span>
                <button class="btn btn-lg btn-dark btn-block" type="submit" name="login">Sign in</button>
            </form>
        <?php
        }
        ?>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(".alert-message").alert().delay(3000).slideUp('slow');
    </script>
</body>
</html>
