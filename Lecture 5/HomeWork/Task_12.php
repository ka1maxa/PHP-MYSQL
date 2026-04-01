<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check folder and file</title>
</head>
<body>
    <form method="POST">
        <label>Sheiyvane folderis saxeli : </label>
        <input type="text" name="folderName"> <br><br><br>

        <label>sheiyvane files saxeli : </label>
        <input type="text" name="fileName"> <br><br><br>
        
        <label>sheiyvane text : </label>
        <textarea name="text"></textarea>

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
        function CheckFolderAndFile()
        {
            $folderName = trim($_POST["folderName"]);
            $fileName = trim($_POST["fileName"]);
            $text = $_POST["text"] ?? "";

            if($folderName == "")
                {
                    echo "sheiyvane folderis saxeli" . "\n";
                    return;
                }
            if($fileName == "")
                {
                    echo "sheiyvane failis saxeli" . "\n";
                    return;
                }
            if(!file_exists($folderName))
                {
                    if(mkdir($folderName))
                        {
                            echo "folderi sheiqmna";
                        }
                }
                 $fileFullPath = $folderName . "/" . $fileName;
                    if(!file_exists($fileFullPath))
                        {
                            $file = fopen($fileFullPath, "w");
                            fwrite($file, $text . "\n");
                            fclose($file);
                        }
                    else
                        {
                            
                            $file = fopen($fileFullPath, "a");
                            fwrite($file, $text . "\n");
                            fclose($file);
                        }
                     $file = fopen($fileFullPath, "r");
                     $res = fread($file, filesize($fileFullPath));
                     fclose($file);
                     
                     echo $res;
        }
        CheckFolderAndFile();
    }
?>
</html>