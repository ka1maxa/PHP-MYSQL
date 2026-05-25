<?php
session_start();
require_once '../php_folder/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id = '{$_SESSION['user_id']}'"));
if ($user['role'] != 'admin') {
    header("Location: ../programs.php");
    exit();
}

$programs_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM programs WHERE deleted_at IS NULL"))['count'];
$users_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM users WHERE deleted_at IS NULL"))['count'];
$workouts_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM workout_sets"))['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/shota/PHP-MYSQL/Lecture 10 (project)/css_folder/admin.css">
    <title>Admin Panel</title>
</head>
<body>
<div class="admin-layout">
    <div class="sidebar">
        <div class="sidebar-logo">ADMIN</div>
        <nav>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/index.php" class="active">დაშბორდი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/programs/index.php">პროგრამები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/users/index.php">მომხმარებლები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/programs.php">საიტი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/php_folder/logout.php">გასვლა</a>
        </nav>
    </div>
    <div class="main-content">
        <h1>დაშბორდი</h1>
        <div class="stats-grid">
            <div class="stat-card">
                <p>პროგრამები</p>
                <h2><?= $programs_count ?></h2>
            </div>
            <div class="stat-card">
                <p>მომხმარებლები</p>
                <h2><?= $users_count ?></h2>
            </div>
            <div class="stat-card">
                <p>შენახული სეტები</p>
                <h2><?= $workouts_count ?></h2>
            </div>
        </div>
    </div>
</div>
</body>
</html>