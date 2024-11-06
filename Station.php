<?php
session_start();
$cookieDuration = 86400;

if (isset($_COOKIE['search_history'])) {
    $searchHistory = json_decode($_COOKIE['search_history'], true);
} else {
    $searchHistory = [];
}

$searchResults = [];
$stations = [
    ["name" => "Malang Station", "location" => "Jl. Trunojoyo No.10, Kiduldalem, Kec. Klojen, Kota Malang, Jawa Timur 65111", "facilities" => "Parkir, Toilet, Restoran"],
    ["name" => "Probolinggo Station", "location" => "Mayangan, Kec. Mayangan, Kota Probolinggo, Jawa Timur", "facilities" => "Toilet, Kios"],
    ["name" => "Surabaya Station", "location" => "Jl. Stasiun Gubeng, Pacar Keling, Kec. Tambaksari, Surabaya, Jawa Timur 60272", "facilities" => "Parkir, Toilet, Restoran, Kios"],
    ["name" => "Yogyakarta Station", "location" => "Jl. Ps. Kembang No.26, Sosromenduran, Gedong Tengen, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271", "facilities" => "Parkir, Toilet, Restoran, Kios"],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
    $searchQuery = $_POST['search'];
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
            <li><a href="#">Route</a></li>
            <li><a href="Schedule.php">Schedule</a></li>
            <li><a href="#" class="active">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg"></a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_akun.svg"></a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Find a Station</h1>
        <form method="POST" action="">
            <input id="search-input" class="search" type="text" name="search" placeholder="Search Station..." list="search-history">
            <button type="submit">Cari</button>
  
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
</body>
</html>
