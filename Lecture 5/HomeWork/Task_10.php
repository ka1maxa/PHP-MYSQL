<?php
function CopyPaste()
{
    $Newfolder = "backup";
    $source_file = "Files/data.txt";
    $destination = "backup/data_copy.txt";
    if(!file_exists($Newfolder))
        {
            if(mkdir($Newfolder))
                {
                    echo "file created";
                }

        }
    if(copy($source_file, $destination))
        {
            echo "dakopirda";
        }
    else
        {
            echo "ver dakopirda";
        }
}
CopyPaste()
?>