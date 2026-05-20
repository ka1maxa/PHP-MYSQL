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
        <form action="./php_folder/auth.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label>ემაილი</label>
                <input type="email" name="email" placeholder="შეიყვანე ემაილი" required>
            </div>
            <div class="form-group">
                <label>პაროლი</label>
                <input type="password" name="password" placeholder="შეიყვანე პაროლი" required>
            </div>
            <button type="submit">შესვლა</button>
            <p class="register-link">არ გაქვს აქაუნთი? <a href="./register.php">რეგისტრაცია</a></p>
        </form>
    </div>
</body>
</html>