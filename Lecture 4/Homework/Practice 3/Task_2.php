<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenerateRandomTable</title>
</head>
<?php
if(isset($_POST["submit"]))
{
    $arr = [];
    $M = $_POST["M"];
    $N = $_POST["N"];
    $a = $_POST["a"];
    $b = $_POST["b"];

    for($i = 0; $i < $M; $i++ )
        {
            for($j = 0; $j < $N; $j++)
            {
                $arr[$i][$j] = rand($a, $b);
            }
        }
}
function GenerateRandomTable($arr, $M,$N)
    {
        echo'<table border = 1';
        for($i = 0; $i < $M; $i++)
            {
                echo'<tr>';
                for($j = 0; $j < $N; $j++)
                {
                    echo'<td>' . $arr[$i][$j] . '</td>';
                }
                echo'</tr>';
            }
        echo'</table>';
    }
?>
<body>
    <form method="POST">
        <label>შეიყვანე M :</label>
        <input type="number" name="M"><br>
        
        <label>შეიყვანე N :</label>
        <input type="number" name="N"><br>
        
        <label>შეიყვანე a :</label>
        <input type="number" name="a"><br>
        
        <label>შეიყვანე b :</label>
        <input type="number" name="b"><br>

        <input type="submit" name="submit">
    </form>
<?php
GenerateRandomTable($arr,$M,$N);
?>
</body>
</html>
