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
    <title>About Us</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/Gemini_Generated_Image_2tc08t2tc08t2tc0.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="./programs.php">PROGRAMS</a></li>
                <li><a href="./about.php" class="active">ABOUT US</a></li>
                <li><a href="./contact.php">CONTACTS</a></li>
            </ul>
        </nav>
        <div class="actions">
            <span class="username">გამარჯობა, <?= $_SESSION['user_name'] ?>!</span>
            <a href="./php_folder/logout.php" class="auth-button">გასვლა</a>
        </div>
    </header>

    <div class="programs-container">
        <h2>ABOUT US</h2>
        <p style="color: rgba(255,255,255,0.7); font-size: 16px; line-height: 1.8; max-width: 700px;">
            ჩვენ ვართ პროფესიონალი ფიტნეს ინსტრუქტორების გუნდი, რომელიც დაგეხმარება მიაღწიო შენს მიზნებს. 
            ჩვენი პლატფორმა გთავაზობს მრავალფეროვან სავარჯიშო პროგრამებს — დამწყებიდან პროფესიონალამდე.
        </p>
    </div>
</body>
</html>