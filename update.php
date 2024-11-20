<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = mysqli_query($koneksi, "SELECT * FROM tabel_tiket WHERE Id_Tiket = $id");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data tiket tidak ditemukan!";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $class = $_POST['class'];
        $tanggal = $_POST['tanggal'];

        $sql = "UPDATE tabel_tiket SET 
                Stasiun_Asal='$asal', 
                Stasiun_Tujuan='$tujuan', 
                Class='$class', 
                Tanggal_Berangkat='$tanggal' 
                WHERE Id_Tiket=$id";

        if (mysqli_query($koneksi, $sql)) {
            header("Location: Schedule.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "ID tiket tidak diberikan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tiket</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Update.css">
</head>
<body>
    <div class="form-container">
        <h2>Update Tiket</h2>
        <form method="POST">
            <label for="asal">Stasiun Asal</label>
            <input type="text" id="asal" name="asal" value="<?php echo htmlspecialchars($data['Stasiun_Asal']); ?>" required>

            <label for="tujuan">Stasiun Tujuan</label>
            <input type="text" id="tujuan" name="tujuan" value="<?php echo htmlspecialchars($data['Stasiun_Tujuan']); ?>" required>

            <label for="class">Kelas</label>
            <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($data['Class']); ?>" required>

            <label for="tanggal">Tanggal Berangkat</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($data['Tanggal_Berangkat']); ?>" required>

            <button type="submit">Update</button>
            <a href="Schedule.php">Kembali ke Jadwal</a>
        </form>
    </div>
</body>
</html>
