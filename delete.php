<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tabel_tiket WHERE Id_Tiket = $id";

    if (mysqli_query($koneksi, $sql)){
        $sql = "DELETE FROM tabel_rute where Id_Rute = $id";
    }

    if (mysqli_query($koneksi, $sql)) {
        header("Location: Schedule.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header("Location: Schedule.php");
}
?>
