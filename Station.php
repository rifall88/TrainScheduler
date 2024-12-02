<?php
session_start();
$cookieDuration = 86400;

require 'koneksi.php';

if (isset($_COOKIE['search_history'])) {
    $searchHistory = json_decode($_COOKIE['search_history'], true);
} else {
    $searchHistory = [];
}

$searchResults = [];

$stations = [];
$sql = "SELECT * FROM tabel_stasiun";
$result = mysqli_query($koneksi, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $stations[] = [
            "name" => $row['Nama'],
            "location" => $row['Lokasi'], 
            "facilities" => $row['Fasilitas']
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
    $searchQuery = mysqli_real_escape_string($koneksi, $_POST['search']);
    if (!in_array($searchQuery, $searchHistory)) {
        $searchHistory[] = $searchQuery;
        $_SESSION['search_history'] = $searchHistory;
        setcookie('search_history', json_encode($searchHistory), time() + $cookieDuration, "/");
    }

    foreach ($stations as $station) {
        if (stripos($station['name'], $searchQuery) !== false) {
            $searchResults[] = $station;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Station Page</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Station.css">
</head>
<body>
    <div class="navbar">
        <div>
            <img src="http://localhost/2318074_Projek/assets/logo.png" alt="This Logo">
        </div>
        <ul>
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="Route.php">Route</a></li>
            <li><a href="Schedule.php">Schedule</a></li>
            <li><a href="#" class="active">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg"></a></li>
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
    <div class="content">
        <h1>Find a Station</h1>
        <form method="POST" action="">
            <input id="search-input" class="search" type="text" name="search" placeholder="Search Station..." list="search-history">
            <button class="tmbl1" type="submit">Cari</button>
  
            <datalist id="search-history">
                <?php foreach ($searchHistory as $history): ?>
                    <option value="<?php echo htmlspecialchars($history); ?>">
                <?php endforeach; ?>
            </datalist>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>Station Name</th>
                    <th>Location</th>
                    <th>Facility</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($searchResults) > 0) {
                    foreach ($searchResults as $station) {
                        echo "<tr>
                                <td>" . htmlspecialchars($station['name']) . "</td>
                                <td>" . htmlspecialchars($station['location']) . "</td>
                                <td>" . htmlspecialchars($station['facilities']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>Not found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
    <script>
        document.getElementById('search-input').value = '';
    </script>
    <script src="http://localhost/2318074_Projek/Javascript/Dropdown.js"></script>
</body>
</html>
