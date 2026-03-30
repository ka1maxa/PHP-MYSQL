<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check the folder</title>
</head>
<body>
    <form method="POST">
        <label>sheiyvane folderis saxeli : </label>
        <input type="text" name="FolderSearch" required>

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
{
$UserInpt = trim($_POST["FolderSearch"]);

if(!file_exists($UserInpt))
    {
        if(mkdir($UserInpt))
            {
                echo "file created";
            }
    }
else
    {
        $res = scandir($UserInpt);
        foreach($res as $f)
            {
                echo $f . "\n";
            }
    }
}
?>
</html>