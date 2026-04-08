<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- moicavs fails -->
    <form action="" method="POST" enctype="multipart/form-data">
        <label>sheagde sheni faili : </label>
        <input type="file" name="file[]" multiple>
        <br><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>
<?php


// tvirtavs fails foldershi rodenobas
$target_dir = "Storage/";
if (isset($_POST["submit"])) 
    {
       for($i = 0; $i < count($_FILES["file"]["name"]); $i++)
        {
            $name = $_FILES["file"]["name"][$i];
            $tmp_name = $_FILES["file"]["tmp_name"][$i];

            move_uploaded_file($tmp_name, $target_dir . $name);
        }
    }
?>
</html>