<?php
$connect = mysqli_connect("localhost", "root", "", "gym_programs_db");

if (!$connect) {
    echo "კონექშენის შეცდომა: " . mysqli_connect_error();
}
?>