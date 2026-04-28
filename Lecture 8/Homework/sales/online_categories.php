<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categories</title>
</head>
<body>
    <form method="POST">
        <label>sheiyvane category name : </label>
        <input type="text" name="category">
        <br>
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
        $connection = mysqli_connect("localhost", "root", "", "online_sales");
        $categories_name = trim($_POST["category"]);

        if($categories_name == "")
            {
                echo "sheiyvane category name!!!";
            }
        else
            {
                $insert = "INSERT INTO categories(category) VALUES('$categories_name')";
                mysqli_query($connection,$insert);
                header("Location: online_categories.php");
            }
    }

if(isset($_GET["get"]))
    {
        $connection = mysqli_connect("localhost", "root", "", "online_sales");
        $result = mysqli_query($connection, "SELECT * FROM categories");
        $rows = mysqli_fetch_all($result);

        echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
        echo "<tr>
                <th style='border: 1px solid black; padding: 5px;'>ID</th>
                <th style='border: 1px solid black; padding: 5px;'>Role</th>
              </tr>";

        foreach($rows as $r)
        {
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 5px;'>".$r[0]."</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>".$r[1]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
</html>