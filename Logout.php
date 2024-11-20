<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Berhasil Logout');
            window.location = 'Login.php';
        </script>
    ";
?>
