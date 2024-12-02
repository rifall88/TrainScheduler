<?php
include 'koneksi.php';

$query = "
    SELECT 
        Stasiun_Asal,
        Stasiun_Tujuan
    FROM tabel_rute
";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Page</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Route.css">
</head>
<body>
    <div class="navbar">
        <div>
            <img src="http://localhost/2318074_Projek/assets/logo.png" alt="This Logo">
        </div>
        <ul>
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="#" class="active">Route</a></li>
            <li><a href="Schedule.php">Schedule</a></li>
            <li><a href="Station.php">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg" alt="Notification Icon"></a></li>
            <li class="dropdown">
                <button class="dropdown-toggle">
                    <img src="http://localhost/2318074_Projek/assets/icon_akun.svg" alt="Profile Picture" class="profile-img">
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="menu-item">
                        <span class="icon">👤</span> My Profile
                    </a>
                    <a href="#" class="menu-item">
                        <span class="icon">🛒</span> Histori Pesanan
                    </a>
                    <a href="#" class="menu-item">
                        <span class="icon">⚙️</span> Setting
                    </a>
                    <a href="Logout.php" class="menu-item logout">
                        <span class="icon">🔴</span> Log Out
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <div>
        <table class="tabel-data" border="1">
            <thead>
                <tr>
                    <th>Home Station Address</th>
                    <th>Destination Station Address</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)):?>
                <tr>
                    <td><?php 
                                $asal = $row['Stasiun_Asal'];
                                $query2 = "SELECT Lokasi FROM tabel_stasiun WHERE Nama = '$asal'";
                                $result2 = mysqli_query($koneksi, $query2);
                                while ($row2 = mysqli_fetch_assoc($result2)): 
                                    echo htmlspecialchars($row2['Lokasi']);
                                endwhile;
                        ?></td>
                    <td><?php
                                $tujuan = $row['Stasiun_Tujuan'];
                                $query3 = "SELECT Lokasi FROM tabel_stasiun WHERE Nama = '$tujuan'";
                                $result3 = mysqli_query($koneksi, $query3);
                                while ($row3 = mysqli_fetch_assoc($result3)): 
                                    echo htmlspecialchars($row3['Lokasi']);
                                endwhile;
                        ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
    <script src="http://localhost/2318074_Projek/Javascript/Dropdown.js"></script>
</body>
</html>
