<?php

    $arr = [];
    for($i = 0; $i < 10;$i++)
    {
        for($j = 0; $j < 10; $j++)
        {
             $arr[$i][$j] = rand(10,99);
        }
    }
    function GenerateRandomTable($arr)
    {
        
        echo '<table border="1">';
        for($i = 0; $i < 10; $i++ )
        {
            echo'<tr>';
            for($j = 0; $j < 10; $j++)
                {
                    echo"<td>" . $arr[$i][$j] . "</td>";
                }
            echo'</tr>';
        }
        echo'</table>';
    }

    GenerateRandomTable($arr)
?>

