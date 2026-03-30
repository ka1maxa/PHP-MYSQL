<?php 
    $filename = 'files/numbers.txt';
    generateNums($filename);

    function generateNums($filename) {
        if(file_exists($filename)) {
            $file = fopen($filename, "r");
            $content = fread($file, filesize($filename));
            echo $content;

            fclose($file);
        } else {
            $file = fopen($filename, "w");

            for($i = 0; $i < 10; $i++) {
                fwrite($file, rand(1, 100) . "\n");
            }

            $file = fopen($filename, 'r');
            $content = fread($file, filesize($filename));
            echo $content;

            fclose($file);
        }
    }
?>