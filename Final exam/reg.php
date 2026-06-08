<?php
include 'db.php';

if(isset($_POST['submit']))
    {
        $userName = trim($_POST['userName']);
        $userPassword = trim($_POST['userPassword']);

        //user carieli rom ar iyos
        if(empty($userName))
            {
                echo "sheiyvane saxeli !!";
            } 
            else if(empty($userPassword))
            {
                echo "paroli arunda iyos carieli"; //paroli rom carieli ar iyos
            }
            else if(!preg_match('/^[a-zA-Z]+$/', $userPassword))
            {
                echo "paroli unda iyos mxolod inglisurad!"; //inglisurad rom checkavdes parols
            }     
            else if(!preg_match('/[A-Z]/', $userPassword))
            {
                echo "parolshi minimum erti didi aso unda iyos !!"; //didi aso rom iyos
            }
        else
            {
                $query = "INSERT INTO users( username ,  password)
                                     VALUES('$userName','$userPassword')";
                mysqli_query($connect, $query);
                header('Location: login.php');
                exit();                     
            }
        
    }
?>
<body>
    <form method='POST'>
        <label>sheiyvane saxeli : </label>
        <input type="text" name='userName' required><br><br>

        <label>sheiyvane paroli : </label>
        <input type="password" name='userPassword' required><br><br>

        <input type="submit" name='submit' value='SUBMIT'>
    </form>
</body>