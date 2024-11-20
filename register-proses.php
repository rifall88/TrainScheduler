<?php 
include 'koneksi.php';

if (isset($_POST['register'])) {
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $confirm_password = $_POST["Confirm_Password"];

    if (empty($email) || empty($password) || empty($confirm_password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'Register.php';
            </script>
        ";
    } elseif ($password !== $confirm_password) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
                window.location = 'Register.php';
            </script>
        ";
    } elseif (strlen($password) > 25) {
        echo "
            <script>
                alert('Password tidak boleh lebih dari 25 karakter');
                window.location = 'Register.php';
            </script>
        ";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $query_sql = "INSERT INTO tabel_pengguna (Email, Kata_Sandi) VALUES ('$email', '$password_hashed')";

        if (mysqli_query($koneksi, $query_sql)) {
            echo "
                <script>
                    alert('Pendaftaran Berhasil, Silakan Login');
                    window.location = 'Login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan, coba lagi');
                    window.location = 'Register.php';
                </script>
            ";
        }
    }
}
?>
