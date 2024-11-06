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
            <li><a href="#">Route</a></li>
            <li><a href="#" class="active">Schedule</a></li>
            <li><a href="Station.php">Station</a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_notif.svg"></a></li>
            <li><a href="#"><img src="http://localhost/2318074_Projek/assets/icon_akun.svg"></a></li>
        </ul>
    </div>
    <div class="ticket-form">
        <h2>Ticket Booking</h2>
        <form id="ticketForm">
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
            <input type="date" id="tanggal" name="tanggal">

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

            <button type="button" onclick="pesanTiket()">Pesan & Cari Kereta</button>
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
                </tr>
            </thead>
            <tbody id="tabelbody">
                
            </tbody>
        </table>
    </div>
    <div id="modalAlert" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Booking Status</h2>
            <p id="modalMessage"></p>
            <button id="modalOkButton">OK</button>
        </div>
    </div>
    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
    <script src="http://localhost/2318074_Projek/Javascript/Schedule.js"></script>
</body>
</html>