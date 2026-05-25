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
        <h2>registracia</h2>
        <?php if($error != "")
            { 
        ?>
            <p class="error"><?= $error ?></p>
        <?php 
            }
        ?>
        <form method="POST">
            <div class="form-group">
                <label>saxeli</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="register">register</button>
            <p class="register-link">ukve gaqvs account?<a href="./login.php">Enter</a></p>
        </form>
    </div>
</body>
</html>