<?php
session_start();
require_once '../../php_folder/config.php';
require_once '../../php_folder/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: /shota/PHP-MYSQL/Lecture 10 (project)/login.php");
    exit();
}


if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($connect, "UPDATE users SET deleted_at=NOW() WHERE id=$id");
    header("Location: index.php");
    exit();
}

if (isset($_POST['id'], $_POST['name'])) {
    $id = (int)$_POST['id'];
    $name = trim($_POST['name']);
    $age = (int)$_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $role = $_POST['role'];

    mysqli_query($connect, "UPDATE users SET name='$name', age='$age', weight='$weight', height='$height', role='$role' WHERE id=$id");
    header("Location: index.php");
    exit();
}


$create_error = "";
if (isset($_POST['create'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    $create_error = register_user($connect, $name, $email, $password);
    if (!$create_error) {
        $user_id = mysqli_fetch_assoc(mysqli_query($connect, "SELECT id FROM users ORDER BY id DESC LIMIT 1"))['id'];
        mysqli_query($connect, "UPDATE users SET role='$role' WHERE id=$user_id");
        header("Location: index.php");
        exit();
    }
}

$users = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users WHERE deleted_at IS NULL"), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/shota/PHP-MYSQL/Lecture 10 (project)/css_folder/admin.css">
    <title>მომხმარებლები</title>
</head>
<body>
<div class="admin-layout">
    <div class="sidebar">
        <div class="sidebar-logo">ADMIN</div>
        <nav>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/index.php">დაშბორდი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/programs/index.php">პროგრამები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/admin/users/index.php" class="active">მომხმარებლები</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/programs.php">საიტი</a>
            <a href="/shota/PHP-MYSQL/Lecture 10 (project)/php_folder/logout.php">გასვლა</a>
        </nav>
    </div>
    <div class="main-content">
        <h1>მომხმარებლები</h1>

        <!-- CREATE FORM -->
        <div class="form-section">
            <h2>მომხმარებლის დამატება</h2>
            <?php if($create_error != ""): ?>
                <p class="error"><?= $create_error ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label>სახელი</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>ემაილი</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>პაროლი</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>როლი</label>
                    <select name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" name="create" class="btn-submit">დამატება</button>
            </form>
        </div>

        
        <?php if (isset($_GET['edit']))
        { 
            $edit_id = (int)$_GET['edit'];
            $edit_user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id=$edit_id"));
        ?>
        <div class="form-section">
            <h2>რედაქტირება</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $edit_user['id'] ?>">
                <div class="form-group">
                    <label>სახელი</label>
                    <input type="text" name="name" value="<?= $edit_user['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label>ასაკი</label>
                    <input type="number" name="age" value="<?= $edit_user['age'] ?>">
                </div>
                <div class="form-group">
                    <label>წონა (კგ)</label>
                    <input type="number" step="0.1" name="weight" value="<?= $edit_user['weight'] ?>">
                </div>
                <div class="form-group">
                    <label>სიმაღლე (სმ)</label>
                    <input type="number" step="0.1" name="height" value="<?= $edit_user['height'] ?>">
                </div>
                <div class="form-group">
                    <label>როლი</label>
                    <select name="role">
                        <option value="user" <?= $edit_user['role']=='user'?'selected':'' ?>>User</option>
                        <option value="admin" <?= $edit_user['role']=='admin'?'selected':'' ?>>Admin</option>
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
                    <th>ასაკი</th>
                    <th>წონა</th>
                    <th>სიმაღლე</th>
                    <th>როლი</th>
                    <th>მოქმედება</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $u)
                     { 
                ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= $u['name'] ?></td>
                    <td><?= $u['age'] ?></td>
                    <td><?= $u['weight'] ?></td>
                    <td><?= $u['height'] ?></td>
                    <td><?= $u['role'] ?></td>
                    <td>
                        <a href="?edit=<?= $u['id'] ?>" class="btn-edit">EDIT</a>
                        <?php if($u['id'] != $_SESSION['user_id']) { ?>
                        <a href="?delete=<?= $u['id'] ?>" class="btn-delete" onclick="return confirm('darwmunebuli xar?')">DELETE</a>
                        <?php
                         }
                         ?>
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