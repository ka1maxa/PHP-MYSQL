<?php
session_start();
include 'db.php';

if(isset($_POST['submit']))
    {
        $user = trim($_POST["user"]);
        $password = trim($_POST["password"]);

        if(empty($user))
            {
                echo "sheiyvane user !!";
            };
        if(empty($password))
                {
                    echo "sheiyvane paroli !!";
                }
                if($password == "1234" && $user == "admin")
                {
                    $_SESSION['user'] = $user;
                    
                    header("Location: dashboard.php");
                    exit();
                }else
                    {
                        $query = "SELECT * FROM users where username = '$user' AND password = '$password'";
                        $res = mysqli_query($connect,$query);

                        if(mysqli_num_rows($res) > 0)
                            {
                                $_SESSION['user'] = $user;
                                header("Location: forUsers.php");
                                exit();
                            }
                            else
                                {
                                    echo "araswori monacemebia";
                                }
                    }   
    }
?>
<body>
    <form method="POST">
        <label>User : </label>
        <input type="text" name="user" required><br><br>
        
        <label>Password : </label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>