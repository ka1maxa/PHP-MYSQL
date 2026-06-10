<?php
session_start();
include 'db.php';

if(isset($_POST['submit']))
    {
    $user = trim($_POST["user"]);
    $password = trim($_POST["password"]);

    if(empty($user))
    {
        echo "შეიყვანე user!";
    }
    else if(empty($password))
    {
        echo "შეიყვანე პაროლი!";
    } 
    else
    {
        $query = "SELECT * FROM users WHERE username='$user' AND deleted_at IS NULL";
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($res);

        if($row && password_verify($password, $row['password']))
         {
            $_SESSION['user'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if($row['role'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: forUsers.php");
            }
            exit();
        } else {
            echo "არასწორი მონაცემები!";
        }
    }
}
?>

<body>
    <form method="POST">
        <label>User: </label>
        <input type="text" name="user"><br><br>

        <label>Password: </label>
        <input type="password" name="password"><br><br>

        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>