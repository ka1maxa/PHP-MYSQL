<?php
session_start();
if (!isset($_SESSION['user_id']))
{
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
            <img src="./images/logo.png" alt="logo">
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

    <section class="contact-section">
        <div class="contact-container">

            <div class="contact-info">
                <h1>Get In Touch</h1>

                <p>
                    თუ გაქვს კითხვები სავარჯიშო პროგრამებზე, კვებაზე ან წევრობაზე,
                    დაგვიკავშირდი ნებისმიერ დროს. ჩვენი გუნდი მზად არის დაგეხმაროს.
                </p>

                <div class="info-box">
                    <h3>Email</h3>
                    <span>fitness@gmail.com</span>
                </div>

                <div class="info-box">
                    <h3>Phone</h3>
                    <span>+995 555 123 456</span>
                </div>

                <div class="info-box">
                    <h3>Location</h3>
                    <span>Tbilisi, Georgia</span>
                </div>
            </div>

        </div>
    </section>

</body>
</html>