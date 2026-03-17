<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>შეიყვანე X: </label>
        <input type="number" name="X" min="10" max="100" required>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>
<?php
$array = [];

for($i = 0; $i < 12; $i++){
    $array[] = rand(10, 100);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $X = $_POST['X'];

    $naklebi = 0;
    $meti = 0;

    foreach($array as $value){
        if($value < $X){
            $naklebi++;
        } else if($value > $X)
        {
            $meti++;
        }
    }
    echo "X-ზე ნაკლები ელემენტის რაოდენობა: " . $naklebi . "<br>";
    echo "X-ზე მეტი ელემენტის რაოდენობა: " . $meti . "<br>";
}
?>