<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Array</title>
</head>
<?php
include 'Task_4_Array.php';
?>
<body>
    <table border="1">
        <?php for($i = 0; $i < count($cars); $i++): ?>
            <tr>
                <td><?php echo $cars[$i]['make'] ?></td>
                <td><?php echo $cars[$i]['model'] ?></td>
                <td><?php echo $cars[$i]['color'] ?></td>
                <td><?php echo $cars[$i]['Mileage'] ?></td>
                <td><?php echo $cars[$i]['Status'] ?></td>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>