<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Code</title>
</head>
<?php
$FirstNum = rand(0,99);
$SecondNum = rand(0,99);

$PickaMove = rand(0,1);

if($PickaMove == 0)
    {
        $res = $FirstNum + $SecondNum;
    }
else
    {
        $res = $FirstNum - $SecondNum;
    }
echo $res
?>
<body>
    <form method="POST">
        <label>sheiyvane kodi : </label>
        <input type="number" name="userCode">

        <input type="hidden" name="SecCode" value="<?php echo $res; ?>"> 

        <input type="submit" name="submit">
    </form>
<?php
if(isset($_POST["submit"]))
    {
        $User = $_POST["userCode"];
        $SecCode = $_POST["SecCode"];
        
        if($User == $SecCode)
            {
                echo "sworia";
            }
        else
            {
                echo "arasworia";
            }
    }
?>
</body>
</html>