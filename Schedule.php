<?php
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM tabel_tiket");

$status = isset($_GET['status']) && $_GET['status'] == 'success';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Page</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Schedule.css">
</head>
<body>
    <div class="navbar">
        <div>
            <img src="http://localhost/2318074_Projek/assets/logo.png" alt="This Logo">
        </div>
        <ul>
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="Route.php">Route</a></li>
            <li><a href="#" class="active">Schedule</a></li>
            <li><a href="Station.php">Station</a></li>
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

    <?php if ($status): ?>
        <div id="modalAlert" class="modal" style="display: block;">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <h2>Booking Status</h2>
                <p>Pesanan Berhasil, Silakan Lakukan Pembayaran</p>
                <button id="modalOkButton" onclick="closeModal()">OK</button>
            </div>
        </div>
    <?php endif; ?>

    <script>
        function closeModal() {
            document.getElementById('modalAlert').style.display = 'none';
        }
    </script>

    <div class="ticket-form">
        <h2>Ticket Booking</h2>
        <form id="ticketForm" action="proses-pesan.php" method="POST">
            <label for="asal">Home Station</label>
            <select id="asal" name="asal">
                <option value="">Home Station</option>
            </select>

            <label for="tujuan">Destination Station</label>
            <select id="tujuan" name="tujuan" disabled>
                <option value="">Destination Station</option>
            </select>

            <label for="class">Select Class</label>
            <select id="class" name="class">
                <option value="">Select Class</option>
                <option value="Economy">Economy Class</option>
                <option value="Business">Business Class</option>
                <option value="Executive">Executive Class</option>
            </select>

            <label for="tanggal">Departure Date</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="dewasa">Mature</label>
            <select id="dewasa" name="dewasa">
                <option value="1">1 Mature</option>
                <option value="2">2 Mature</option>
                <option value="3">3 Mature</option>
            </select>

            <label for="infant">Infant</label>
            <select id="infant" name="infant">
                <option value="0">0 Infant</option>
                <option value="1">1 Infant</option>
            </select>

            <button type="submit">Pesan Tiket</button>
        </form>
    </div>
    
    <div>
        <div>
            <button type="button" class="tombol" onclick="window.location.href='Schedule-cetak.php';">
                Cetak Raport
            </button>
        </div>
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
                <?php 
                if ($result && mysqli_num_rows($result) > 0): 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Stasiun_Asal']); ?></td>
                            <td><?php echo htmlspecialchars($row['Stasiun_Tujuan']); ?></td>
                            <td><?php echo htmlspecialchars($row['Class']); ?></td>
                            <td><?php echo htmlspecialchars($row['Tanggal_Berangkat']); ?></td>
                            <td>Paid</td>
                            <td>
                                <a href="update.php?id=<?php echo urlencode($row['Id_Tiket']); ?>" class='tmbl'>Update</a>
                                <a href="delete.php?id=<?php echo urlencode($row['Id_Tiket']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class='tmbl'>Delete</a>
                            </td>
                        </tr>
                    <?php 
                    endwhile; 
                else: ?>
                    <tr>
                      
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="http://localhost/2318074_Projek/Javascript/Schedule.js"></script>
    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
</body>
</html>
