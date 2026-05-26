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
        <link rel="stylesheet" href="css_folder/programs.css">
        <title>About Us</title>
    </head>
    <style>
        body {
    margin: 0;
    padding: 0;
    background-color: #111;
    font-family: 'Oswald', sans-serif;
        }

        header {
            background-color: #000000;
            color: #ffffff;
            display: flex;
            align-items: center;
            padding: 15px 40px;
            text-transform: uppercase;
        }

        .logo img {
            height: 65px;
            display: block;
        }

        nav {
            margin-left: 50px;
            flex-grow: 1;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            letter-spacing: 1px;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #FFD700;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .username {
            color: #FFDE00;
            font-size: 16px;
        }

        .auth-button {
            background-color: #FFDE00;
            color: #000000;
            padding: 12px 30px;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 2px;
            transition: background-color 0.3s;
        }

        .auth-button:hover {
            background-color: #e6c800;
        }

        /* CONTACT SECTION */

        .contact-section {
            padding: 60px 40px;
            color: white;
        }

        .contact-container {
            max-width: 800px;
            margin: auto;
        }

        .contact-info h1 {
            font-size: 42px;
            margin-bottom: 20px;
            color: #FFDE00;
            text-transform: uppercase;
        }

        .contact-info p {
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
            margin-bottom: 40px;
            font-size: 16px;
        }

        .info-box {
            background-color: #1a1a1a;
            border: 1px solid #333;
            padding: 20px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }

        .info-box:hover {
            border-color: #FFDE00;
        }

        .info-box h3 {
            margin: 0 0 10px 0;
            color: #FFDE00;
            font-size: 18px;
        }

        .info-box span {
            color: #ffffff;
            font-size: 15px;
        }
    </style>
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