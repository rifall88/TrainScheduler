<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM tabel_pengguna WHERE Email = '$email'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['Kata_Sandi'])) {
            echo "
                <script>
                    alert('Login Berhasil');
                    window.location = 'Dashboard.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Password Salah');
                    window.location = 'Login.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Email tidak ditemukan');
                window.location = 'Login.php';
            </script>
        ";
    }
}
?>
