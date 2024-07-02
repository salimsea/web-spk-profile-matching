<?php
    $host     = "localhost";
    $username = "slmyid_dss";
    $password = "slmyid_dss";
    $database = "slmyid_skripsi_tina";
    $koneksi  = mysqli_connect($host, $username, $password, $database);

    if (! $koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    } 

   
?>
