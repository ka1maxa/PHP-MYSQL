<?php
function GenerateNumbersForTable($rows = 10, $cols = 10)
{
    $matrix = [];
    for($i = 0; $i < $rows; $i++)
        {
            for($j = 0; $j < $cols; $j++)
                {
                    $matrix[$i][$j] = rand(10,99);
                }
        }
    echo '<table border="1">';
    for($i = 0; $i < $rows; $i++)
        {
            echo "<tr>";
            for($j = 0; $j < $cols; $j++)
                {
                    echo "<td>" . $matrix[$i][$j] . "</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
}

GenerateNumbersForTable();
?>
