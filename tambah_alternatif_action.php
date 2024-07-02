<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan'])) {
	$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'] ,ENT_QUOTES)));
	$created_by = $_SESSION['id_user'];

    
    $query = "INSERT INTO master_alternatif (nama, created_by) VALUES (?, ?)";
    $pelamar = $koneksi->prepare($query);
    $pelamar->bind_param("ss", $nama, $created_by);
    
    if ($pelamar->execute()) {
    	echo "<script>alert('Data Berhasil Disimpan');location='home.php?page=alternatif';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
?>