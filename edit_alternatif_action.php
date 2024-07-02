<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id_alternatif = stripslashes(strip_tags(htmlspecialchars($_POST['id_alternatif'] ,ENT_QUOTES)));
	$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'] ,ENT_QUOTES)));

	$query = "UPDATE master_alternatif SET nama=? WHERE id_alternatif=?";
    $pelamar = $koneksi->prepare($query);
    $pelamar->bind_param("si", $nama, $id_alternatif);
    
    if ($pelamar->execute()) {
    	echo "<script>alert('Data Berhasil Diubah');location='home.php?page=alternatif';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$db1->close();
?>