<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewrite Text and print</title>
</head>
<body>
    <form action="" method="POST">
        <label>შეიყვანე სიტყვა : </label>
        <input type="text" name="UserPrint">

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
function test()
    {
        $fileName = "Files/user.txt";
        $UserPrint = $_POST["UserPrint"];

        $file = fopen("Files/user.txt", "w");
        fwrite($file, $UserPrint);
        fclose($file);

        $file = fopen($fileName, "r");
        $res = fread($file, filesize("Files/user.txt"));
        fclose($file);
        echo $res;
        }
test();
    }
?>
</html>