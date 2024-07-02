<?php
include 'koneksi.php';

if (isset($_GET['aa'])) {
	$id = stripslashes(strip_tags(htmlspecialchars( base64_decode($_GET['aa']) ,ENT_QUOTES)));

	$query = "DELETE FROM master_alternatif WHERE id_alternatif=?";
    $pelamar = $koneksi->prepare($query);
    $pelamar->bind_param("i", $id);
    
    if ($pelamar->execute()) {
    	echo "<script>alert('Data Berhasil Dihapus');location='home.php?page=alternatif';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
?>