<?php
function GenerateNewFolder()
{
$NewFolder = "Files2";
$newFile1 = "Files2/file1.txt";
$newFile2 = "Files2/file2.txt";
$newFile3 = "Files2/file3.txt";
if(!file_exists($NewFolder))
    {
        if(mkdir($NewFolder))
            {
                echo "file created";
            }
    }


$file = fopen($newFile1, "w");
fwrite($file, "We love PHP" . "\n");
fclose($file);

$file = fopen($newFile2, "w");
fwrite($file, "We love hard tasks" . "\n");
fclose($file);

$file = fopen($newFile3, "w");
fwrite($file, "It's hard" . "\n");
fclose($file);

$file = scandir("Files2");
foreach($file as $f)
    {
        echo $f . "\n";
    }
}
GenerateNewFolder();
?>