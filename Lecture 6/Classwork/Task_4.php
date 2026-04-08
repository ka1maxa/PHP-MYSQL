<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHEPE</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>shemoitane axali faili : </label>
        <input type="file" name="file" accept=".png, .jpg, .gif">

        <input type="submit" name="submit" value="upload">
    </form>
</body>

<?php

$target_dir = "Storage/";
if (isset($_POST["submit"])) 
    {
        $name = $_FILES["name"];
        $fileSize = $_FILES["size"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $size = 1024 * 1024  * 10;

        if($ext == "png" || $ext == "jpg" || $ext == "gif")
            {
                if($fileSize <= $size)
            {
                move_uploaded_file($tmp_name, $target_dir . $name);
            }
                else
            {
                echo "failis zoma agemateba 100mb";
            }
                 
            }
        else
            {
                echo "shemoitane faili formatit png, jpg, gif";
            }
       
    }
?>
</html>