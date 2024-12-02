<?php
include 'koneksi.php';

$date = date("dmyHis");
echo($date);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $asal = mysqli_real_escape_string($koneksi, $_POST['asal']);
    $tujuan = mysqli_real_escape_string($koneksi, $_POST['tujuan']);
    $class = mysqli_real_escape_string($koneksi, $_POST['class']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $dewasa = (int) $_POST['dewasa'];
    $infant = (int) $_POST['infant'];

    $sql = "INSERT INTO tabel_tiket (Id_Tiket, Stasiun_Asal, Stasiun_tujuan, Class, Tanggal_Berangkat, Jumlah_PenumpangDewasa, Jumlah_PenumpangBayi) 
            VALUES ('$date', '$asal', '$tujuan', '$class', '$tanggal', '$dewasa', '$infant')";

    if (mysqli_query($koneksi, $sql)){
        $sql = "INSERT INTO tabel_rute (Id_Rute, Stasiun_Asal, Stasiun_tujuan) 
            VALUES ('$date', '$asal', '$tujuan')";
    }

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
