<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5Num Security Code</title>
</head>
<?php
$code = rand(10000,99999);

echo "ur code : " . $code; 
?>
<body>
    <form method="POST">
        <label>sheiyvane sheni 5 nishna kodi : </label>
        <input type="number" name="UserCode"><br>

        <input type="hidden" name="randCode" value="<?php echo $code ?>">

        <input type="submit" name="submit">
    </form>
</body>
<?php 
if(isset($_POST["submit"]))
    {
        $User = $_POST["UserCode"];
        $RandCode = $_POST["randCode"];

        if($User == $RandCode)
            {
                echo "sworia";
            }
        else
            {
                echo "araswroia";
            }
    } 
?>
</html>