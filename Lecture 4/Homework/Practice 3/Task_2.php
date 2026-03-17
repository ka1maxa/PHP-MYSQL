<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Random Table</title>
</head>
<body>
    <form method="POST">
        <label>შეიყვანე M : </label>
        <input type="text" name="M"><br>

        <label>შეიყვანე N : </label>
        <input type="text" name="N"><br>

        <label>შეიყვანე a : </label>
        <input type="text" name="a"><br>

        <label>შეიყვანე b : </label>
        <input type="text" name="b"><br>

        <input type="submit" value="Generate Table">
    </form>
</body>
</html>
<?php
IF($_SERVER["REQUEST_METHOD"] == "POST")
{
    $M = $_POST["M"];
    $N = $_POST["N"];
    $a = $_POST["a"];
    $b = $_POST["b"];

    $Error = [];

    if(!is_numeric($M) && $M <= 0)
        {
            $Error[] = "M უნდა იყოს დადებითი რიცხვი";
        }
    if(!is_numeric($N) && $N <= 0)
        {
            $Error[] = "N უნდა იყოს დადებითი რიცხვი";
        }
    if(!is_numeric($a))
        {
            $Error[] = "a უნდა იყოს დადებითი რიცხვი";
        }
    if(!is_numeric($b))
        {
            $Error[] = "b უნდა იყოს დადებითი რიცხვი";
        }
    if (empty($errors))
        {
        generateRandomTable($M,$N,$a,$b);
        }
    else {
        echo "<div style='margin-top: 20px;'>";
        foreach ($errors as $err) {
            echo $err . "<br>";
        }
        echo "</div>";
    }
}
function GenerateRandomTable($M, $N, $a, $b){
    echo "<table border='1' style: text-align: center;>";
    for ($i = 0; $i < $M; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $N; $j++) {
            $num = rand($a, $b);
            echo "<td style='padding: 5px;'>" . $num . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>