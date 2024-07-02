<?php
$db = mysqli_connect("localhost","slmyid_dss","slmyid_dss","slmyid_skripsi_tina");
if($host){
  echo "Koneksi berhasil";
 } else{
  echo "Koneksi gagal!" . mysqli_connect_error();
  die();
 }
?>
