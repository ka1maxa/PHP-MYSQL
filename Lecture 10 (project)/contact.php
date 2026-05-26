<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_folder/programs.css">
    <title>Contacts</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/Gemini_Generated_Image_2tc08t2tc08t2tc0.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="./programs.php">PROGRAMS</a></li>
                <li><a href="./about.php">ABOUT US</a></li>
                <li><a href="./contact.php" class="active">CONTACTS</a></li>
            </ul>
        </nav>
        <div class="actions">
            <span class="username">გამარჯობა, <?= $_SESSION['user_name'] ?>!</span>
            <a href="./php_folder/logout.php" class="auth-button">გასვლა</a>
        </div>
    </header>

    <div class="programs-container">
        <h2>CONTACTS</h2>
        <div style="color: rgba(255,255,255,0.7); font-size: 16px; line-height: 2;">
            <p>📧 Email: info@gymprofit.com</p>
            <p>📞 Phone: +995 555 123 456</p>
            <p>📍 Address: თბილისი, საქართველო</p>
        </div>
    </div>
</body>
</html>