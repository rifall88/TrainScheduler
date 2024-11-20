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
            <li><a href="#">Route</a></li>
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
    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
    <script>
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevents the click from bubbling to the window
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        window.addEventListener('click', function() {
            dropdownMenu.style.display = 'none';
        });
    </script>
</body>
</html>
