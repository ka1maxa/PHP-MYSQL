<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="./bank_system.css">
    <form method="POST">
        <label>sheiyvane momxmareblis saxeli :</label>
        <input type="text" name="Fname">
        <br>
        <label>sheiyvane momxmareblis gvari :</label>
        <input type="text" name="Lname">
        <br>
        <label>sheiyvane momxmareblis nomeri :</label>
        <input type="text" name="number">
        <br>
        <label>sheiyvane momxmareblis meili :</label>
        <input type="email" name="mail">
        <br>
        <label>sheiyvane momxmareblis misamarti :</label>
        <input type="text" name="address">
        <br>
        <input type="submit" name="submit">
        <br><br><br>
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
        $connection = mysqli_connect("localhost", "root", "", "bank_system");
        $Fname = trim($_POST["Fname"]);
        $Lname = trim($_POST["Lname"]);
        $number = $_POST["number"];
        $mail = $_POST["mail"];
        $address = $_POST["address"];

        if($Fname == "" || $Lname == "" || $number == "" || $mail == "" || $address == "")
            {
                echo "sheiyvane sheni monacemebi sworad";
            }
        else
            {
                $insert = "insert into customer (customer_ID,F_name,L_name,phone,emile,address) values ('$ID','$Fname','$Lname','$number','$mail','$address')";
                mysqli_query($connection,$insert);
                header("Location: bank_system_db.php");
            }
    }

$connection = mysqli_connect("localhost", "root", "", "bank_system");

$result = mysqli_query($connection, "SELECT * FROM customer");

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
foreach($rows as $r)
    {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>F_name : " . $r['F_name']  . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>L_nmae : " . $r['L_name']  . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Phone : " . $r['phone']  . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Mail : " . $r['emile']  . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Address : " . $r['address']  . "</td>";
        echo "</tr>";

    }
?>
</html>