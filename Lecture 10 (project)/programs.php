<?php
session_start();
require_once './php_folder/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

$programs_query = "SELECT * FROM programs WHERE deleted_at IS NULL";
$programs_result = mysqli_query($connect, $programs_query);
$programs = mysqli_fetch_all($programs_result, MYSQLI_ASSOC);
?>
<?php if($_SESSION['role'] == 'admin')
    {
         ?>
    <a href="./admin/index.php" class="auth-button">ადმინ პანელი</a>
<?php 
    } 
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_folder/programs.css">
    <title>Programs</title>
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
                <li><a href="./contact.php">CONTACTS</a></li>
            </ul>
        </nav>
        <div class="actions">
            <span class="username">hi, <?= $_SESSION['user_name'] ?>!</span>
            <a href="./php_folder/logout.php" class="auth-button">logout</a>
        </div>
    </header>

    <div class="programs-container">
        <h2>Programs</h2>
        <div class="programs-grid">
            <?php foreach($programs as $program): ?>
                <div class="program-card">
                    <h3><?= $program['title'] ?></h3>
                    <p><?= $program['description'] ?></p>
                    <p class="level"><?= strtoupper($program['level']) ?> | <?= $program['duration_weeks'] ?> weeks</p>
                    <a href="./workout.php?program_id=<?= $program['id'] ?>" class="details-btn">Details</a>
                </div>
            <?php endforeach; ?>

            <?php if(empty($programs))
                { ?>
                <p style="color: rgba(255,255,255,0.5);">programa ar aris damatebuli</p>
            <?php
                }?>
        </div>
    </div>
</body>
</html>