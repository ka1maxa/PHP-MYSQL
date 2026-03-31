<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Files from Folder</title>
</head>
<body>
    <form method="POST">
        <label>sheiyvane folderis saxeli : </label>
        <input type="text" name="folderName">

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
function PrintFolderItems()
{
        $folder = $_POST["folderName"];

        if(file_exists($folder))
            {
                $res = scandir($folder);
                foreach($res as $r)
                    {
                        if(str_ends_with($r, ".txt"))
                            {
                                $filesize = filesize($folder . "/" . $r);
                                $filedate = date("Y-m-d H:i:s",fileatime($folder . "/" . $r)) ;
                                
                                echo $r . "size :    " . $filesize . "created time :     " . $filedate ."\n";
                            }
                    }
            }
    }
PrintFolderItems();
}
?>
</html>