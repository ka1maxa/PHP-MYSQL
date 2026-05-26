<?php
session_start();
require_once './php_folder/config.php';
require_once './php_folder/functions.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ./admin/index.php");
    } else {
        header("Location: ./programs.php");
    }
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $error = login_user($connect, $email, $password);
    if (!$error) {
        if ($_SESSION['role'] == 'admin')    
        {
            header("Location: ./admin/index.php");
        } else {
            header("Location: ./programs.php");
        }
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_folder/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>LOG IN</h2>
        <?php if($error != ""): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>ემაილი</label>
                <input type="email" name="email" placeholder="შეიყვანე ემაილი" required>
            </div>
            <div class="form-group">
                <label>პაროლი</label>
                <input type="password" name="password" placeholder="შეიყვანე პაროლი" required>
            </div>
            <button type="submit" name="login">შესვლა</button>
            <p class="register-link">არ გაქვს აქაუნთი? <a href="./register.php">რეგისტრაცია</a></p><br>
            <p class="register-link"><a href="./forgot_password.php">დაგავიწყდა პაროლი?</a></p>
        </form>
    </div>
</body>
</html>