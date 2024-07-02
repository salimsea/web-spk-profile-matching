<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id_faktor_nilai = stripslashes(strip_tags(htmlspecialchars($_POST['id_faktor_nilai'], ENT_QUOTES)));
    $id_faktor = stripslashes(strip_tags(htmlspecialchars($_POST['id_faktor'], ENT_QUOTES)));
    $nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
    $nilai = stripslashes(strip_tags(htmlspecialchars($_POST['nilai'], ENT_QUOTES)));

    $query = "UPDATE pm_faktor_nilai SET id_faktor=?, nama=?, nilai=? WHERE id_faktor_nilai=?";
    $kriteria = $koneksi->prepare($query);
    $kriteria->bind_param("issi", $id_faktor, $nama, $nilai, $id_faktor_nilai);

    if ($kriteria->execute()) {
        echo "<script>alert('Data Berhasil Diubah');location='home.php?page=subkriteria';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
?>
