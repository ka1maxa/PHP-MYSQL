<?php
function GenerateNewFile()
{
$userData = "Files/data.txt";
if(file_exists($userData))
    {
       echo "arsebobs";
    }
else
    {
        $file = fopen("Files/data.txt", "w");
        $file = fwrite($file, "Created new file");

        $files = fopen($userData, "r");
        $res = fread($files, filesize("Files/data.txt"));

        echo "axali file sheiqmna";
    }
}

GenerateNewFile();
?>