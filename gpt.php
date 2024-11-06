<?php
// Data stasiun dalam array
$stations = [
    ["name" => "Stasiun A", "location" => "Jakarta", "facilities" => "Parkir, Toilet, Restoran"],
    ["name" => "Stasiun B", "location" => "Bandung", "facilities" => "Toilet, Kios"],
    ["name" => "Stasiun C", "location" => "Yogyakarta", "facilities" => "Parkir, Toilet, Restoran, Kios"],
    // Tambahkan lebih banyak stasiun sesuai kebutuhan
];

// Menyimpan hasil pencarian
$searchQuery = "";
$searchResults = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = trim($_POST['search'] ?? '');

    // Filter stasiun berdasarkan pencarian
    foreach ($stations as $station) {
        if (stripos($station['name'], $searchQuery) !== false || stripos($station['location'], $searchQuery) !== false) {
            $searchResults[] = $station;
        }
    }
} else {
    $searchResults = $stations; // Jika tidak ada pencarian, tampilkan semua stasiun
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <title>Halaman Stasiun</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.navbar {
    background-color: #333;
    color: #fff;
    padding: 15px;
}

.navbar img {
    height: 40px; /* Atur tinggi logo */
}

.navbar ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: flex-end;
}

.navbar ul li {
    margin-left: 20px;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
}

.navbar ul li a:hover {
    text-decoration: underline;
}

.content {
    padding: 20px;
}

h1 {
    color: #333;
}

form {
    margin-bottom: 20px;
}

form input[type="text"] {
    padding: 10px;
    width: 200px; /* Lebar input pencarian */
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

.footer {
    background-color: #333;
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
}

.footer-left img {
    height: 40px; /* Atur tinggi gambar di footer */
}

.footer-right p {
    margin: 0;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="assets/logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="route.php">Route</a></li>
            <li><a href="station.php">Station</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="login.php">Sign In</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Daftar Stasiun</h1>
        
        <!-- Formulir Pencarian -->
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Cari Stasiun..." value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit">Cari</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nama Stasiun</th>
                    <th>Lokasi</th>
                    <th>Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($searchResults) > 0) {
                    foreach ($searchResults as $station) {
                        echo "<tr>
                                <td>{$station['name']}</td>
                                <td>{$station['location']}</td>
                                <td>{$station['facilities']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada hasil ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Jadwal Kereta</h2>
        <table>
            <thead>
                <tr>
                    <th>Kereta</th>
                    <th>Kedatangan</th>
                    <th>Keberangkatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kereta 1</td>
                    <td>10:00</td>
                    <td>10:30</td>
                    <td>Tepat Waktu</td>
                </tr>
                <tr>
                    <td>Kereta 2</td>
                    <td>11:00</td>
                    <td>11:15</td>
                    <td>Tertunda</td>
                </tr>
                <tr>
                    <td>Kereta 3</td>
                    <td>12:00</td>
                    <td>12:20</td>
                    <td>Tepat Waktu</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="footer-left">
            <img src="assets/train.svg" alt="Train Image">
        </div>
        <div class="footer-right">
            <p>0881-0278-00228<br>trainscheduler@gmail.com<br>www.trainscheduler.com</p>
        </div>
    </div>
</body>
</html>
