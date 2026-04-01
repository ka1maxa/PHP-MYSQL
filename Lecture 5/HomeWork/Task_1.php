<?php
function CreateAndWriteText()
{
    $fileName = "Files/test.txt";

    $file = fopen($fileName, "w");
    fwrite($file,"Hello world");
    fclose($file);

    $file = fopen($fileName, "r");
    $res = fread($file, filesize($fileName));
    fclose($$file);

    echo $res;
}
CreateAndWriteText();
?>