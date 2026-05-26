<?php
session_start();
require_once '../../php_folder/config.php';
require_once '../../php_folder/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: /shota/PHP-MYSQL/Lecture 10 (project)/login.php");
    exit();
}

// DELETE
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($connect, "UPDATE programs SET deleted_at=NOW() WHERE id=$id");
    header("Location: index.php");
    exit();
}

// UPDATE
if (isset($_POST['id'], $_POST['title'])) {
    $id = (int)$_POST['id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $duration_weeks = (int)$_POST['duration_weeks'];
    $level = $_POST['level'];
    $goal = $_POST['goal'];

    mysqli_query($connect, "UPDATE programs SET title='$title', description='$description', duration_weeks='$duration_weeks', level='$level', goal='$goal' WHERE id=$id");
    header("Location: index.php");
    exit();
}

// CREATE
if (isset($_POST['create'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $duration_weeks = (int)$_POST['duration_weeks'];
    $level = $_POST['level'];
    $goal = $_POST['goal'];

    mysqli_query($connect, "INSERT INTO programs (title, description, duration_weeks, level, goal, created_by) VALUES ('$title', '$description', '$duration_weeks', '$level', '$goal', '{$_SESSION['user_id']}')");
    header("Location: index.php");
    exit();
}

$programs = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM programs WHERE deleted_at IS NULL"), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/shota/PHP-MYSQL/Lecture 10 (project)/css_folder/admin.css">
    <title>პროგრამები</title>
</head>
<body>
<div class="admin-layout">
    <div class="sidebar">
        <div class="sidebar-logo">ADMIN</div>
        <nav>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/index.php">დაშბორდი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/programs/index.php" class="active">პროგრამები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/users/index.php">მომხმარებლები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/programs.php">საიტი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/php_folder/logout.php">გასვლა</a>
        </nav>
    </div>
    <div class="main-content">
        <h1>პროგრამები</h1>

        <div class="form-section">
            <h2>პროგრამის დამატება</h2>
            <form method="POST">
                <div class="form-group">
                    <label>სახელი</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>აღწერა</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>კვირების რაოდენობა</label>
                    <input type="number" name="duration_weeks" required>
                </div>
                <div class="form-group">
                    <label>დონე</label>
                    <select name="level">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>მიზანი</label>
                    <select name="goal">
                        <option value="weight_loss">Weight Loss</option>
                        <option value="muscle_gain">Muscle Gain</option>
                        <option value="endurance">Endurance</option>
                        <option value="flexibility">Flexibility</option>
                    </select>
                </div>
                <button type="submit" name="create" class="btn-submit">დამატება</button>
            </form>
        </div>

        <!-- EDIT FORM -->
        <?php if (isset($_GET['edit']))
            { 
            $edit_id = (int)$_GET['edit'];
            $program = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM programs WHERE id=$edit_id"));
        ?>
        <div class="form-section">
            <h2>რედაქტირება</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $program['id'] ?>">
                <div class="form-group">
                    <label>სახელი</label>
                    <input type="text" name="title" value="<?= $program['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label>აღწერა</label>
                    <textarea name="description" rows="3"><?= $program['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>კვირების რაოდენობა</label>
                    <input type="number" name="duration_weeks" value="<?= $program['duration_weeks'] ?>" required>
                </div>
                <div class="form-group">
                    <label>დონე</label>
                    <select name="level">
                        <option value="beginner" <?= $program['level']=='beginner'?'selected':'' ?>>Beginner</option>
                        <option value="intermediate" <?= $program['level']=='intermediate'?'selected':'' ?>>Intermediate</option>
                        <option value="advanced" <?= $program['level']=='advanced'?'selected':'' ?>>Advanced</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>მიზანი</label>
                    <select name="goal">
                        <option value="weight_loss" <?= $program['goal']=='weight_loss'?'selected':'' ?>>Weight Loss</option>
                        <option value="muscle_gain" <?= $program['goal']=='muscle_gain'?'selected':'' ?>>Muscle Gain</option>
                        <option value="endurance" <?= $program['goal']=='endurance'?'selected':'' ?>>Endurance</option>
                        <option value="flexibility" <?= $program['goal']=='flexibility'?'selected':'' ?>>Flexibility</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">შენახვა</button>
            </form>
        </div>
        <?php 
            }
        ?>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>სახელი</th>
                    <th>დონე</th>
                    <th>მიზანი</th>
                    <th>კვირა</th>
                    <th>მოქმედება</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($programs as $program)
                    {
                 ?>
                <tr>
                    <td><?= $program['id'] ?></td>
                    <td><?= $program['title'] ?></td>
                    <td><?= $program['level'] ?></td>
                    <td><?= $program['goal'] ?></td>
                    <td><?= $program['duration_weeks'] ?></td>
                    <td>
                        <a href="?edit=<?= $program['id'] ?>" class="btn-edit">რედაქტირება</a>
                        <a href="?delete=<?= $program['id'] ?>" class="btn-delete" onclick="return confirm('დარწმუნებული ხარ?')">წაშლა</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>