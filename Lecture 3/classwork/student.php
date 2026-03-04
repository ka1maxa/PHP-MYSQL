<?php
    include 'Questions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Information</title>
</head>
<body>
    <form action="Lecture.php" method="POST">
        <table class="questions-tb">
            <tr>
                <th><b>Questions</b></th>
                <th><b>Answers</b></th>
                <th><b>Max Point</b></th>
            </tr>
            <?php
            for($i =0; $i < count($questions); $i++){
            ?>
            <tr>
                <td><?= ($questions[$i]['question'])?></td>
                <td><input type="text" name="answers"></td>
                <th><?= ($questions[$i]['max_point'])?></th>
            </tr>
            <?php
            }
            ?>
            <tr class="form-section">
              <td colspan="3">
                <input type="text" name="Fname" placeholder="First Name">
                <input type="text" name="Lname" placeholder="Last Name">
                <br><br>
                <input type="submit" value="Submit">
              </td>
        </tr>
        </table>
          
    </form>
</body>
</html>