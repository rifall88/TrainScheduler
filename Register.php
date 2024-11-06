<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="http://localhost/2318074_Projek/css/Register.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <h1>Welcome To <br> Train Scheduler</h1>
            <p>I hope your journey goes smoothly <br> and there are no obstacles</p>
            <img src="http://localhost/2318074_Projek/assets/train.png" alt="Train Image">
        </div>
        <div class="right">
            <div class="logo">
                <img src="http://localhost/2318074_Projek/assets/logo.png" alt="Train Scheduler Logo">
            </div>
            <form>
                <input type="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" placeholder="Password" required>
                    <span class="show-password"></span>
                </div>
                <div class="password-container">
                    <input type="password" placeholder="Confirm Password" required>
                    <span class="show-password"></span>
                </div>
                <a class="button" href="Login.php">Sign Up</a>
                <div class="line">
                    <img src="http://localhost/2318074_Projek/assets/line.png" alt="line">
                    <span>or</span>
                    <img src="http://localhost/2318074_Projek/assets/line.png" alt="line">
                </div>
                <button class="google-login">
                    <img src="http://localhost/2318074_Projek/assets/Icons_Google.png" alt="Icon Google">
                    Sign up with Google
                </button>
                <p>Are you new? <a href="Login.php">I Already Have An Account</a></p>
            </form>
        </div>
    </div>
</body>
</html>
