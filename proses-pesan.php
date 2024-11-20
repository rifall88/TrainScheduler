<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $asal = mysqli_real_escape_string($koneksi, $_POST['asal']);
    $tujuan = mysqli_real_escape_string($koneksi, $_POST['tujuan']);
    $class = mysqli_real_escape_string($koneksi, $_POST['class']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $dewasa = (int) $_POST['dewasa'];
    $infant = (int) $_POST['infant'];

    $sql = "INSERT INTO tabel_tiket (Stasiun_Asal, Stasiun_tujuan, Class, Tanggal_Berangkat, Jumlah_PenumpangDewasa, Jumlah_PenumpangBayi) 
            VALUES ('$asal', '$tujuan', '$class', '$tanggal', '$dewasa', '$infant')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: Schedule.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header("Location: Schedule.php");
    exit();
}
?>
