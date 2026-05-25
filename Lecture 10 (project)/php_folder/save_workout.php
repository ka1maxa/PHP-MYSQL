<?php
session_start();
require_once 'config.php';

$user_id = $_SESSION['user_id'];
$exercise_id = $_POST['exercise_id'];
$program_id = $_POST['program_id'];
$weights = $_POST['weight'];
$reps = $_POST['reps'];
$date = date('Y-m-d');

foreach($weights as $i => $weight) {
    if($weight != '' && $reps[$i] != '') {
        $set_number = $i + 1;
        $query = "INSERT INTO workout_sets (user_id, exercise_id, program_id, set_number, weight, reps, date) 
                  VALUES ('$user_id', '$exercise_id', '$program_id', '$set_number', '$weight', '{$reps[$i]}', '$date')";
        mysqli_query($connect, $query);
    }
}

header("Location: ../workout.php?program_id=$program_id&success=შენახულია");
exit();
?>