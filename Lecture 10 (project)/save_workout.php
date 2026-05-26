<?php
session_start();
require_once 'config.php';

$user_id = $_SESSION['user_id'];
$exercise_id = $_POST['exercise_id'];
$program_id = $_POST['program_id'];
$weights = $_POST['weight'];
$reps = $_POST['reps'];
$date = date('Y-m-d');

foreach($weights as $i => $weight)
    {
    if($weight != '' && $reps[$i] != '')
        {
        $set_number = $i + 1;
        
        $check = mysqli_query($connect, "SELECT id FROM workout_sets 
            WHERE user_id='$user_id' AND exercise_id='$exercise_id' 
            AND set_number='$set_number' AND date='$date'");
        
        if(mysqli_num_rows($check) > 0)
        {
            $row = mysqli_fetch_assoc($check);
            mysqli_query($connect, "UPDATE workout_sets 
                SET weight='$weight', reps='{$reps[$i]}' 
                WHERE id='{$row['id']}'");
        }
        else
        {
            mysqli_query($connect, "INSERT INTO workout_sets 
                (user_id, exercise_id, program_id, set_number, weight, reps, date) 
                VALUES ('$user_id', '$exercise_id', '$program_id', '$set_number', '$weight', '{$reps[$i]}', '$date')");
        }
    }
}

header("Location: ../workout.php?program_id=$program_id&success=შენახულია");
exit();
?>