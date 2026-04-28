<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
</head>
<body>
    <form method="POST">
        <label>sheiyvane user_ID</label>
        <input type="number" name="userId">
        <br><br>
        <label>sheiyvane payment</label>
        <input type="text" name="payment">
        <br><br>
        <input type="submit" value="POST" name="submit">
    </form>
    <br><br><br>
    <form method="GET">
        <input type="submit" value="GET" name="get">
    </form>
</body>

<?php
if(isset($_POST["submit"]))
    {
        $connection = mysqli_connect("localhost","root", "", "online_sales");
        $user_ID = trim($_POST["userId"]);
        $payment = trim($_POST["payment"]);

        if($user_ID == "" || $payment == "")
            {
                echo "sheiyvane monacemebi !!";
            }
        else
            {
                $insert = "INSERT INTO payments(user_id,payment) VALUES('$user_ID','$payment')";
                mysqli_query($connection,$insert);
                header("Localhost: online_payment.php");
            }
    }

if(isset($_GET['get']))
    {
        $connection = mysqli_connect("localhost","root", "","online_sales");
        $get_rows = mysqli_query($connection,"SELECT * FROM payments");
        $result = mysqli_fetch_all($get_rows);

        
        echo "<table style='border-collapse: collapse;'>";
        echo "<tr>";
        echo "<th style='border: 1px solid black; padding: 5px;'>ID</th>";
        echo "<th style='border: 1px solid black; padding: 5px;'>User_ID</th>";
        echo "<th style='border: 1px solid black; padding: 5px;'>Payment</th>";
        echo "</tr>";

        foreach($result as $r)
        {
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 5px;'>".$r[0]."</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>".$r[1]."</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>".$r[2]."</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
?>
</html>