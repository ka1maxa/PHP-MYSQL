<?php
session_start();
require_once './php_folder/config.php';
require_once './php_folder/functions.php';

if (isset($_SESSION['user_id']))
{
    header("Location: ./programs.php");
    exit();
}

$error = "";

if(isset($_POST['register']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if(empty($name))
    {
        $error = "სახელი სავალდებულოა";
    }
    else if(strlen($name) < 2)
    {
        $error = "სახელი მინიმუმ 2 სიმბოლო უნდა იყოს";
    }
    else if(empty($email))
    {
        $error = "ემაილი სავალდებულოა";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = "ემაილი არასწორი ფორმატია";
    }
    else if(empty($password))
    {
        $error = "პაროლი სავალდებულოა";
    }
    else if(strlen($password) < 8)
    {
        $error = "პაროლი მინიმუმ 8 სიმბოლო უნდა იყოს";
    }
    else if(!preg_match('/[A-Z]/', $password))
    {
        $error = "პაროლი მინიმუმ 1 დიდ ასოს უნდა შეიცავდეს";
    }
    else if(!preg_match('/[0-9]/', $password))
    {
        $error = "პაროლი მინიმუმ 1 ციფრს უნდა შეიცავდეს";
    }
    else {
        $error = register_user($connect, $name, $email, $password);
        if (!$error)
        {
            login_user($connect, $email, $password);
            header("Location: ./programs.php");
            exit();
        }
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