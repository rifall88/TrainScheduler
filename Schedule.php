<?php
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM tabel_tiket");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Page</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Schedule.css">
    <style>
        .tmbl {
            background-color: #091057;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="http://localhost/2318074_Projek/assets/logo.png" alt="This Logo">
        </div>
        <ul>
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="#">Route</a></li>
            <li><a href="#" class="active">Schedule</a></li>
            <li><a href="Station.php">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg"></a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_akun.svg"></a></li>
        </ul>
    </div>
    <div class="ticket-form">
        <h2>Ticket Booking</h2>
        <form id="ticketForm" action="proses-pesan.php" method="POST">
            <label for="asal">Home Station</label>
            <input type="text" id="asal" name="asal" placeholder="Enter Home Station" required>
            <label for="tujuan">Destination Station</label>
            <input type="text" id="tujuan" name="tujuan" placeholder="Enter Destination Station" required>
            <label for="class">Select Class</label>
            <input type="text" id="class" name="class" placeholder="Enter Class (Economy, Business, Executive)" required>
            <label for="tanggal">Departure Date</label>
            <input type="date" id="tanggal" name="tanggal" required>
            <label for="dewasa">Mature</label>
            <input type="number" id="dewasa" name="dewasa" min="1" placeholder="Enter Number of Adults" required>
            <label for="infant">Infant</label>
            <input type="number" id="infant" name="infant" min="0" placeholder="Enter Number of Infants" required>
            <button type="submit">Pesan Tiket</button>
        </form>
    </div>
    <div>
        <table class="tabel-data" border="1">
            <thead>
                <tr>
                    <th>Home Station</th>
                    <th>Destination Station</th>
                    <th>Elective Class</th>
                    <th>Departure Date</th>
                    <th>Payment Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['Stasiun_Asal']; ?></td>
                    <td><?php echo $row['Stasiun_Tujuan']; ?></td>
                    <td><?php echo $row['Class']; ?></td>
                    <td><?php echo $row['Tanggal_Berangkat']; ?></td>
                    <td>Unpaid</td>
                    <td>
                    <a href="update.php?id=<?php echo urlencode($row['Id_Tiket']); ?>" class='tmbl'>Update</a>
                    <a href="delete.php?id=<?php echo urlencode($row['Id_Tiket']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class='tmbl'>Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
</body>
</html>
