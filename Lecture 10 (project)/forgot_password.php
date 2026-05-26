<?php
session_start();
require_once './php_folder/config.php';
require_once './php_folder/functions.php';

$error = "";
$success = "";

if (isset($_POST['reset']))
{
    $email = trim($_POST['email']);
    $new_password = $_POST['new_password'];

    $check = mysqli_query($connect, "SELECT * FROM user_credentials WHERE email='$email'");
    if (mysqli_num_rows($check) == 0)
    {
        $error = "ეს ემაილი არ არსებობს";
    }
    else
    {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        mysqli_query($connect, "UPDATE user_credentials SET password='$hashed' WHERE email='$email'");
        $success = "პაროლი წარმატებით შეიცვალა!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_folder/login.css">
    <title>პაროლის აღდგენა</title>
</head>
<body>
    <div class="login-container">
        <h2>პაროლის აღდგენა</h2>
        <?php if($error != "")
            {
        ?>
            <p class="error"><?= $error ?></p>
        <?php
            }
         ?>
        <?php if($success != "")
            {
         ?>
            <p class="success"><?= $success ?></p>
        <?php
            }
         ?>
        <form method="POST">
            <div class="form-group">
                <label>ემაილი</label>
                <input type="email" name="email" placeholder="შეიყვანე ემაილი" required>
            </div>
            <div class="form-group">
                <label>ახალი პაროლი</label>
                <input type="password" name="new_password" placeholder="შეიყვანე ახალი პაროლი" required>
            </div>
            <button type="submit" name="reset">შეცვლა</button>
            <p class="register-link"><a href="./login.php">უკან შესვლაზე</a></p>
        </form>
    </div>
</body>
</html>