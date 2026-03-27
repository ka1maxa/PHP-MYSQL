<?php
include 'file.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lecture 6</title>
</head>
<?php

 ?>
<body>
    <form action="file.php" method="get">
        <label>File name - </label><input type="text" name="f-name">
        <br><br>
        <button>Create File</button>
    </form>
    <form action="file.php" method="get">
        <label>File content - </label><input type="text" name="f-content">
        <br><br>
        <textarea name="textArea" id=""></textarea>
        <button>Write to File</button>
    </form>
    <div class="content">
        <h1>List of Files1</h1>
            <?php
            for($i = 0; $i < count($myFile);$i++)
                {
                    echo "<p> $myFile[$i] </p>";

                }
            ?>
    </div>
</body>
</html>