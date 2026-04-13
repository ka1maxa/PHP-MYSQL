<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create form for files</title>
    <link rel="stylesheet" href="./CSS/Task_44.css">
</head>
<?php
if(isset($_POST["submit"]))
    {
        $Direction = "Storage/";
        $tmp_name = $_FILES["userFile"]["tmp_name"];
        $userFileSize = $_FILES["userFile"]["size"];
        $postSize = 1024 * 1024 * 100;
        $ext = pathinfo($_FILES["userFile"]["name"], PATHINFO_EXTENSION);
        $time = date("d-m-Y". "-" .time());
        if($ext == "jpg" || $ext == "png" || $ext == "gif")
            {
                if($userFileSize > $postSize)
                    {
                        echo "failis zoma agemateba 100-mbs";
                    }
                else
                    {
                        move_uploaded_file($tmp_name, $Direction . $time ." " .$_FILES["userFile"]["name"]);
                        echo "faili daemata";
                    }
            }

    }
?>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>shemoitane sheni faili : </label>
        <input type="file" name="userFile" accept=".png, .jpg, .gif">

        <input type="submit" name="submit">

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

        <input type="submit" name="buttonForDelete" value="DELETE"><br><br>

    </form>
</body>

<?php
if(isset($_POST["buttonForDelete"]))
    {
        function DeleteFile($userFile)
        {
            $file = "Storage/" . $userFile;
            if(file_exists($file))
                {
                    if(is_file($file))
                        {
                            unlink($file);
                            echo "faili waishala";
                        }
                    else
                        {
                            echo "failis formati araa";
                        }   
                }
            else
                {
                    echo "faili ar arsebobs";
                }
        }
        DeleteFile($_POST["FileNameForChanges"]);
    }
?>
</html>