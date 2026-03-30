<?php

function GenerateNewUser()
{
    $newUser = "Files/log.txt";
    $file = fopen($newUser, "a");
    $fileText = "User visited At : " . date("Y-m-d H:i:s") . "\n";
    fwrite($file, $fileText);
    fclose($file);

    $res =  file_get_contents($newUser);

    echo $res;
}
GenerateNewUser();
?>