<?php
session_start();
require_once './php_folder/config.php';
require_once './php_folder/functions.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ./programs.php");
    exit();
}

$error = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = register_user($connect, $name, $email, $password);
    if (!$error) {
        login_user($connect, $email, $password);
        header("Location: ./programs.php");
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
    <title>Register</title>
</head>
<body>
    <div class="login-container">
        <h2>რეგისტრაცია</h2>
        <?php if($error != ""): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>სახელი</label>
                <input type="text" name="name" placeholder="შეიყვანე სახელი" required>
            </div>
            <div class="form-group">
                <label>ემაილი</label>
                <input type="email" name="email" placeholder="შეიყვანე ემაილი" required>
            </div>
            <div class="form-group">
                <label>პაროლი</label>
                <input type="password" name="password" placeholder="შეიყვანე პაროლი" required>
            </div>
            <button type="submit" name="register">რეგისტრაცია</button>
            <p class="register-link">უკვე გაქვს აქაუნთი? <a href="./login.php">შესვლა</a></p>
        </form>
    </div>
</body>
</html>