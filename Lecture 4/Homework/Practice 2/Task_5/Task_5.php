<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<?php
$name = "";
$mail = "";
$website = "";
$comment = "";
$gender = "";

$nameErr = "";
$mailErr = "";
$genderErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["Fname"]))
    {
        $nameErr = "*";
    }
    else
    {
        $name = $_POST["Fname"];
    }
    if(empty($_POST["Mail"]))
    {
        $mailErr = "*";
    }
    else
    {
        $mail = $_POST["Mail"];
    }
    
}
?>
<body>
    <form method="POST">
        <h2>PHP Form Validation Example</h2>
        <label>შეიყვანე სახელი : </label>
        <input type="text" name="Fname" value="<?php echo $name; ?>">
         <span class="error"><?php echo $nameErr; ?></span><br>

        <label>შეიყვანე Mail :</label>
        <input type="text" name="Mail"><br>

        <label>Website :</label>
        <input type="text" name="Website"><br>

        <label>Comment :</label>
        <textarea name="Comment"></textarea><br>

        <label>Gender :</label>
        <input type="radio" name="Gender" value="Male"> Male
        <input type="radio" name="Gender" value="Female"> Female
        <input type="radio" name="Gender" Value="Other"> Other
        <br><br>

        <input type="submit">
    </form>
</body>
</html>