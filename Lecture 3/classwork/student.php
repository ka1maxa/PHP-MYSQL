<?php
include "Questions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Student</title>
</head>
<body>
    <form method="POST" action="lecture.php">
        <table>
        <tr>
            <td><label><b>Question</b></label></td>
            <td><label><b>Answer</b></label></td>
            <td><label><b>Max Points</b></label></td>
        </tr>
        <?php
        for($i = 0; $i < count($Questions); $i++) 
        {
            ?>
        <tr>
            <td><?=($Questions[$i]["question"]) ?></td>
            <td><input type="text" name="answer"></td>
            <td><?=($Questions[$i]["max_point"]) ?></td>
        </tr>
        
        <?php
        }
         ?>
        <tr class="studentName">
            <td><label>studentName</label></td>
            <td><input type="text" name="StudentFname" placeholder="Fname"></td>
            <td><input type="text" name="StudentLname" placeholder="Lname"></td>
            <td><input type="submit" name="submit"></td>
        </tr>
        </table>
    </form>
</body>
</html>