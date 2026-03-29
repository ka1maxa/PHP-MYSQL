<?php
function CreateAndWriteText()
{
    $fileName = "Files/test.txt";

    $file = fopen($fileName, "w");
    fwrite($file,"Hello world");

    $file = fopen($fileName, "r");
    $res = fread($file, filesize($fileName));

    echo $res;
}
CreateAndWriteText();
?>