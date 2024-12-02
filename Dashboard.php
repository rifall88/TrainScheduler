<?php
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM tabel_tiket");

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Dashboard.css">
</head>

<body>
    <div class="navbar">
        <div>
            <img src="http://localhost/2318074_Projek/assets/logo.png" alt="Train Schedule Logo">
        </div>
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="Route.php">Route</a></li>
            <li><a href="Schedule.php">Schedule</a></li>
            <li><a href="Station.php">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg" alt="Notification Icon"></a></li>
            <li class="dropdown">
                <button class="dropdown-toggle">
                    <img src="http://localhost/2318074_Projek/assets/icon_akun.svg" alt="Profile Picture" class="profile-img">
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="menu-item"><span class="icon">👤</span> My Profile</a>
                    <a href="#" class="menu-item"><span class="icon">🛒</span> Histori Pesanan</a>
                    <a href="#" class="menu-item"><span class="icon">⚙️</span> Setting</a>
                    <a href="Logout.php" class="menu-item logout"><span class="icon">🔴</span> Log Out</a>
                </div>
            </li>
        </ul>
    </div>

    <section class="banner">
        <img src="http://localhost/2318074_Projek/assets/Train_Awal.png" alt="Train Banner Image">
    </section>

    <section class="class-info">
        <div class="class-card">
            <h2><a href="#">Ekonomi Class</a></h2>
            <a href="#"><img src="http://localhost/2318074_Projek/assets/EkonomiClass.png" alt="Ekonomi Class"></a>
        </div>
        <div class="class-card">
            <h2><a href="#">Business Class</a></h2>
            <a href="#"><img src="http://localhost/2318074_Projek/assets/Bussiness.jpg" alt="Business Class"></a>
        </div>
        <div class="class-card">
            <h2><a href="#">Eksklusif Class</a></h2>
            <a href="#"><img src="http://localhost/2318074_Projek/assets/Eksklesif.jpg" alt="Eksklusif Class"></a>
        </div>
    </section>

    <section class="widget">
        <h3>Jadwal Keberangkatan Kereta</h3>
        <table>
            <thead>
                <tr>
                    <th>Stasiun Asal</th>
                    <th>Stasiun Tujuan</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0): 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Stasiun_Asal']); ?></td>
                            <td><?php echo htmlspecialchars($row['Stasiun_Tujuan']); ?></td>
                            <td><?php echo htmlspecialchars($row['Tanggal_Berangkat']); ?></td>
                            <td>Paid</td>
                        </tr>
                    <?php 
                    endwhile; 
                else: ?>
                    <tr>
                       
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>

    <script src="http://localhost/2318074_Projek/Javascript/Dropdown.js"></script>
</body>

</html>
