<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
	$id_faktor = stripslashes(strip_tags(htmlspecialchars($_POST['id_faktor'] ,ENT_QUOTES)));
	$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'] ,ENT_QUOTES)));
	$nilai = stripslashes(strip_tags(htmlspecialchars($_POST['nilai'] ,ENT_QUOTES)));

	$query = "INSERT into pm_faktor_nilai (id_faktor, nama, nilai) VALUES (?, ?, ?)";
	print_r("query > ". $query);
    $kriteria = $koneksi->prepare($query);
    $kriteria->bind_param("sss", $id_faktor, $nama, $nilai);
    
    if ($kriteria->execute()) {
    	echo "<script>alert('Data Berhasil Disimpan');location='home.php?page=subkriteria';</script>";
    } else {
		print_r("xx >".$id_faktor);
		print_r("xx >".$nama);
		print_r("xx >".$nilai);
    	// echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
?>