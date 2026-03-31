<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Folder and File</title>
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
        function CreateFolderWithFile()
        {
            $UserFolder = trim($_POST["folderName"]);

            if($UserFolder == "")
                {
                    echo "rame chawere";
                }
            if(!file_exists($UserFolder))
                {
                    if(mkdir($UserFolder))
                        {
                            echo "sheiqmna !";

                            $info = $UserFolder . "/info.txt";
                            $file = fopen($info, "w");
                            $content = $UserFolder . "\n";
                            $content = date("Y-m-d H:i:s") . "\n";
                            fwrite($file, $content);
                            fclose($file);

                            echo "gg";
                        }
                }
             else
                {
                    echo "faili ukve arsebobs";
                }
        }
        CreateFolderWithFile();
    }
?>
</html>