<?php
$connect = mysqli_connect("localhost", "root", "", "gym_programs_db");

if (!$connect) {
    echo "error during connect: " . mysqli_connect_error();
}
?>