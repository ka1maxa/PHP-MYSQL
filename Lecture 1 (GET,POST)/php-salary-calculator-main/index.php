<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <label>სახელი : </label><br>
        <input type="text" name="firstname" required><br>
        <label>გვარი : </label><br>
        <input type="text" name="lastname" required><br>
        <label>თანამდებობა : </label><br>
        <input type="text" name="position" required><br>
        <label>ხელფასი : </label><br>
        <input type="number" name="salary" required><br>

        <label>გადასახადი : </label><br>
        <input type="number" name="tax" value="20" required><br><br>

        <input type="submit" value="count">
    </form>
</body>
</html>

<?php
if(isset($_GET["salary"]))
{
    $firstname = $_GET["firstname"];
    $lastname = $_GET["lastname"];
    $position = $_GET["position"];
    $salary = $_GET["salary"];
    $tax = $_GET["tax"];

    $taxAmount = $salary * $tax / 100;
    $netSalary = $salary - $taxAmount;

    echo "შედეგი :";

    echo  "<table border='1' cellpadding='8'>
            <tr>
                <th>სახელი</th>
                <th>გვარი</th>
                <th>თანამდებობა</th>
                <th>ხელფასი</th>
                <th>გადასახადი (%)</th>
                <th>გადასახადი $$$</th>
                <th>ხელზე ასაღები</th>
            </tr>
            <tr>
                <td>$firstname</td>
                <td>$lastname</td>
                <td>$position</td>
                <td>$salary</td>
                <td>$tax%</td>
                <td>$taxAmount</td>
                <td>$netSalary</td>
            </tr>
          </table>";
}
?>