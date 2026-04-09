<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Task_3.css">
    <title>Create file</title>
</head>
<?php
if(isset($_POST["submit"]))
    {
        function CreateFileTxtFormat($userFile)
        {
       
        $dir = "Storage/";
        $res = $dir . $userFile . ".txt";

        if($userFile ==  "")
            {
                echo '<p style="color:red;">fails saxeli daarqvi !!</p>';
            }
        else
            {
                $file = fopen($res,"w");
                fwrite($file, "");
                fclose($file);
            }
        }
        CreateFileTxtFormat($userFile = $_POST["userFile"]);
    }

if(isset($_POST["submitForChanges"]))
    {
    function ChangeTxt($userFile)
    {
        $Direction = "Storage/";
        $fullDirection = $Direction . $userFile;
        $userTextForFile = $_POST["textForFile"];

        if(file_exists($fullDirection))
            {
                if(is_file($fullDirection))
                    {
                        $files = fopen($fullDirection, "a");
                        fwrite($files, $userTextForFile . "\n");
                        fclose($files);
                        echo "warmatebit daemata teqsti";


                        $lines = file($fullDirection);
                        echo "<ul>";
                        foreach($lines as $line)
                        {
                            echo "<li>" . $line . "</li>";
                        }
                        echo "</ul>";
                    }
            }
        else
            {
                echo "faili ar arsebobs";
            }
    }
    ChangeTxt($_POST["FileNameForChanges"]);
    }
?>
<body>
    <form method="POST">
        <label>sheiyvane sheni failis saxeli : </label>
        <input type="text" name="userFile">

        <input type="submit" name="submit" value="upload">

        <br><br>
        <hr>
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

        <br><br>

        <label>sheiyvane teqsti romelic unda chawero failshi</label><br>
        <input type="text" name="textForFile">

        <input type="submit" name="submitForChanges" value="Edit"><br><br>

        <input type="submit" name="buttonForDelete" value="DELETE"><br><br>
    </form>
</body>
<?php
if(isset($_POST["buttonForDelete"]))
    {
        function DeleteUserFile($userFile)
        {
            $file = "Storage/" . $userFile;
            if(file_exists($file))
                {
                    if(is_file($file))
                        {
                            unlink($file);
                            echo "faili washlilia";
                        }
                }
        }
        DeleteUserFile($_POST["FileNameForChanges"]);
    }
?>
</html>