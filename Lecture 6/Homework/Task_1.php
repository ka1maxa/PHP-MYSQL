<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Task_1.css">
    <title>Create Form for Files.</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>shemoitane sheni file : </label>
        <input type="file" name="file" accept=".png, .jpg, .gif">


        <input type="submit" name="submit"><br><br>


        <h3 style="color:whitesmoke;">Files</h3>
    <?php
    $file = scandir("Storage/");
    echo "<ul>";
    foreach($file as $f)
        {
            if($f == "." || $f == "..")continue;
                {
                    echo "<li>";
                    echo $f . "<br>";
                    echo "</li>";
                }
        }
    echo "</ul>";
    ?> 
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
        $Direction = "Storage/";
        $fileSize = $_FILES["file"]["size"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        $size = 1024 * 1024 * 100;
        $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if($ext == "png" || $ext == "jpg" || $ext == "gif")
            {
                if($fileSize > $size)
                    {
                        echo "failis formati 100MB-ze metia";
                    }
                else
                    {
                        move_uploaded_file($tmp_name, $Direction . $_FILES["file"]["name"]);
                    }
            }
        else
            {
                echo "faili formats ar sheesabameba an veli carielia";
            }
    }
?>
</html>