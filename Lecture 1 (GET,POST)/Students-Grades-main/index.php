<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Grades Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="POST">
    <div class="form-row">
        <div class="left-side">
            <p>სტუდენტების მონაცემები</p>
            <label>სტუდენტის სახელი :</label>
            <input type="text" name="studentName" required>

            <label>სტუდენტის გვარი :</label>
            <input type="text" name="studentSurname" required>

            <label>სტუდენტის კურსი :</label>
            <input type="number" name="studentCourse" required>

            <label>სტუდენტის სემესტრი :</label>
            <input type="number" name="studentSemester" required>

            <label>სასწავლო კურსი :</label>
            <input type="text" name="courseName" required>

            <label>მიღებული ნიშანი :</label>
            <input type="number" name="grade" required>
        </div>
        <div class="right-side">
            <p>ლექტორის და დეკანის მონაცემები</p>
            <label>ლექტორის სახელი :</label>
            <input type="text" name="lecturerName" required>

            <label>ლექტორის გვარი :</label>
            <input type="text" name="lecturerSurname" required>

            <label>დეკანის სახელი :</label>
            <input type="text" name="deanName" required>

            <label>დეკანის გვარი :</label>
            <input type="text" name="deanSurname" required>
        </div>
    </div>

    <div class="submit-container">
        <input type="submit" value="Submit">
    </div>

</form>
</body>
</html>



<?php
if (isset($_POST["studentName"]))
    {
        $studentName = $_POST["studentName"];
        $studentSurname = $_POST["studentSurname"];
        $studentCourse = $_POST["studentCourse"];
        $studentSemester = $_POST["studentSemester"];
        $courseName = $_POST["courseName"];
        $grade = $_POST["grade"];
        $lecturerName = $_POST["lecturerName"];
        $lecturerSurname = $_POST["lecturerSurname"];
        $deanName = $_POST["deanName"];
        $deanSurname = $_POST["deanSurname"];

        $StudentGrade = 0;

        if ($grade >= 90) {
            $StudentGrade = "A";
        } elseif ($grade >= 80) {
            $StudentGrade = "B";
        } elseif ($grade >= 70) {
            $StudentGrade = "C";
        } elseif ($grade >= 60) {
            $StudentGrade = "D";
        } else {
            $StudentGrade = "F";
        }

        echo "<h1>შედეგები:</h1>";
        
        echo "<table border = '1'>
                <tr>
                    <th>სტუდენტის სახელი</th>
                    <th>სტუდენტის გვარი</th>
                    <th>სტუდენტის კურსი</th>
                    <th>სტუდენტის სემესტრი</th>
                    <th>სასწავლო კურსი</th>
                    <th>მიღებული ნიშანი</th>
                    <th>ლექტორის სახელი</th>
                    <th>ლექტორის გვარი</th>
                    <th>დეკანის სახელი</th>
                    <th>დეკანის გვარი</th>
                    <th>სტუდენტის შეფასება</th>
                </tr>
                <tr>
                    <td>$studentName</td>
                    <td>$studentSurname</td>
                    <td>$studentCourse</td>
                    <td>$studentSemester</td>
                    <td>$courseName</td>
                    <td>$grade</td>
                    <td>$lecturerName</td>
                    <td>$lecturerSurname</td>
                    <td>$deanName</td>
                    <td>$deanSurname</td>
                    <td>$StudentGrade</td>
                </tr>
            </table>
                ";
    }
?>