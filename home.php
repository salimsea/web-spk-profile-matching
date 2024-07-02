<?php
session_start();

if( empty( $_SESSION['id_user'] ) ){
  //session_destroy();
  $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
  header('Location: ./login.php');
  die();
} else {
  include "koneksi.php";
  include "class.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <script src='js/fontawesome.js'></script>

<script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">

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
    <link href="css/dashboard.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SPK - Profile Matching</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="keluar.php"> <span data-feather="log-out"></span> Sign out </a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
     <?php include "menu.php"; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          <?php
            if (isset($_REQUEST['page'])){

               $page = $_REQUEST['page'];

              switch($page ){
                case 'alternatif':
                  echo "Data Alternatif";
                  break;
                case 'aspek':
                  echo "Data Aspek";
                  break;
                case 'kriteria':
                  echo "Data Kriteria";
                  break;
                 case 'subkriteria':
                  echo "Sub Kriteria";
                  break;
                case 'profile':
                  echo "Klasifikasi";
                  break;
                case 'perhitungan':
                  echo "Hasil Perhitungan";
                  break;
                case 'gantipassword':
                  echo "Ganti Password";
                  break;
                }
            } else {
              echo "Home";
            }

          ?>

        </h1>
         
      </div>
      <div class="table-responsive">
        <?php
  if( isset($_REQUEST['page'] )){

    $page = $_REQUEST['page'];

    switch($page ){
      case 'alternatif':
        include "alternatif.php";
        break;
      case 'aspek':
        include "aspek.php";
        break;
      case 'tambah_aspek':
        include "tambah_aspek.php";
        break;
       case 'edit_aspek':
        include "edit_aspek.php";
        break;
       case 'tambah_alternatif':
        include "tambah_alternatif.php";
        break;
       case 'edit_alternatif':
        include "edit_alternatif.php";
        break;
      case 'tambah_kriteria':
        include "tambah_kriteria.php";
        break;
       case 'edit_kriteria':
        include "edit_kriteria.php";
        break;
      case 'kriteria':
        include "kriteria.php";
        break;
      case 'tambah_sub_kriteria':
        include "tambah_sub_kriteria.php";
        break;
       case 'edit_sub_kriteria':
        include "edit_sub_kriteria.php";
        break;
      case 'subkriteria':
        include "sub_kriteria.php";
        break;
      case 'profile':
        include "profile.php";
        break;
      case 'perhitungan':
        include "perhitungan.php";
        break;
      case 'gantipassword':
        include "gantipassword.php";
        break;
    }
  } else {
  ?>
      <div class="jumbotron">
        <h3>Halo <strong><?php echo $_SESSION['nama']; ?></strong></h3>
        <p>Selamat Datang di Aplikasi SPK Penentuan Skincare Terbaik Dengan Metode Profile Matching</p>
      </div>
  <?php
  }
  ?>
      </div>

    </main>
  </div>
</div>      
     
  </body>
</html>
<?php
}
?>

