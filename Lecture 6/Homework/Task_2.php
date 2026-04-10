<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Task_2s.css">
    <title>CRUD methods for files (without update)</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>sheiyvane sheni faili : </label>
        <input type="file" name="userFile">

        <input type="submit" name="submit" value="upload">

        <br><br>
        <select name="FileNameForChanges">
        <?php
        $files = scandir("Storage/");
        foreach($files as $f)
        {
            if($f == "." || $f == "..") continue;
            echo "<option value='$f'>$f</option>";
        }
        ?>
        </select>


        <input type="submit" name="submitDelete" value="DELETE">
    </form>
    <br><br><br><br>
    <div class="Files">
         <h3>Failebis Sia : <br></h3>
    </div>
</body>
<?php
if(isset($_POST["submit"]))
    {
        $Direction = "Storage/";
        $fileSize = $_FILES["userFile"]["size"];
        $tmp_name = $_FILES["userFile"]["tmp_name"];
        $size = 1024 * 1024 * 50;
        if($fileSize > $size)
            {
                echo "failis zoma agemateba 50-s";
            }
        else
            {
                move_uploaded_file($tmp_name, $Direction . $_FILES["userFile"]["name"]);
            }
    }

   $file = scandir("Storage/");
    echo "<ul>";
        foreach($file as $f)
            {
                if($f == "." || $f == "..") continue;
               
                echo "<li>";
                echo $f . "    ";
                echo "<a href='Storage/$f' download>Download</a>"; 
                echo "</li>";
                 
            }
    echo "</ul>";  

if(isset($_POST["submitDelete"]))
    {
        function DeleteFileFromFolder($userFile)
        {
            $file = "Storage/" . $userFile;
            if(file_exists($file))
                {
                    if(is_file($file))
                        {
                            unlink($file);
                            echo "faili waishala : " . $userFile;
                        }
                }
        }
        DeleteFileFromFolder($_POST["FileNameForChanges"]);
    }
?>
</html>