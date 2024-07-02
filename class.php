<?php
function cari_nilai($sql){
	$host     = "localhost";
	$username = "slmyid_dss";
    $password = "slmyid_dss";
    $database = "slmyid_skripsi_nami";
    $koneksi  = mysqli_connect($host, $username, $password, $database);

  $hasil=mysqli_query($koneksi, $sql);
  $r=mysqli_fetch_array($hasil);

  return $r["nilai"];
}
?>