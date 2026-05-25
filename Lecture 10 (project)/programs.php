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
            <img src="./images/Gemini_Generated_Image_2tc08t2tc08t2tc0.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">PROGRAMS</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">CONTACTS</a></li>
            </ul>
        </nav>
        <div class="actions">
            <span class="username">გამარჯობა, <?= $_SESSION['user_name'] ?>!</span>
            <a href="./php_folder/logout.php" class="auth-button">გასვლა</a>
        </div>
    </header>

    <div class="programs-container">
        <h2>პროგრამები</h2>
        <div class="programs-grid">
            <?php foreach($programs as $program): ?>
                <div class="program-card">
                    <h3><?= $program['title'] ?></h3>
                    <p><?= $program['description'] ?></p>
                    <p class="level"><?= strtoupper($program['level']) ?> | <?= $program['duration_weeks'] ?> კვირა</p>
                    <a href="./workout.php?program_id=<?= $program['id'] ?>" class="details-btn">დეტალები</a>
                </div>
            <?php endforeach; ?>

            <?php if(empty($programs)): ?>
                <p style="color: rgba(255,255,255,0.5);">პროგრამები არ არის დამატებული</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>