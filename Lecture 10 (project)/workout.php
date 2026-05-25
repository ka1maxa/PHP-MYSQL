<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

require_once './php_folder/config.php';

$program_id = $_GET['program_id'];

$program_query = "SELECT * FROM programs WHERE id = '$program_id'";
$program_result = mysqli_query($connect, $program_query);
$program = mysqli_fetch_assoc($program_result);

$exercises_query = "SELECT pe.*, e.name, e.muscle_group, e.difficulty 
                    FROM program_exercises pe 
                    JOIN exercises e ON pe.exercise_id = e.id 
                    WHERE pe.program_id = '$program_id'
                    ORDER BY pe.day_number, pe.id";
$exercises_result = mysqli_query($connect, $exercises_query);
$exercises = mysqli_fetch_all($exercises_result,MYSQLI_ASSOC);
$days = [];
foreach($exercises as $exercise) 
{
    $days[$exercise['day_number']][] = $exercise;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_folder/workout.css">
    <title><?= $program['title'] ?></title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/Gemini_Generated_Image_2tc08t2tc08t2tc0.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="./programs.php">PROGRAMS</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">CONTACTS</a></li>
            </ul>
        </nav>
        <div class="actions">
            <span class="username">hi, <?= $_SESSION['user_name'] ?></span>
            <a href="./php_folder/logout.php" class="auth-button">EXIT</a>
        </div>
    </header>

    <div class="workout-container">
        <div class="program-header">
            <h2><?= $program['title'] ?></h2>
            <p><?= $program['description'] ?></p>
        </div>

        <?php foreach($days as $day_number => $day_exercises)
            {
        ?>
            <div class="day-section">
                <h3>დღე <?= $day_number ?></h3>
                <div class="exercises-grid">
                    <?php foreach($day_exercises as $exercise)
                        { 
                    ?>
                        <div class="exercise-card">
                            <h4><?= $exercise['name'] ?></h4>
                            <p class="muscle"><?= $exercise['muscle_group'] ?></p>
                            <p class="sets-info"><?= $exercise['sets'] ?> სეტი x <?= $exercise['reps'] ?> გამეორება</p>
                            <p class="rest">დასვენება: <?= $exercise['rest_seconds'] ?> წმ</p>

                            <form action="./php_folder/save_workout.php" method="POST">
                                <input type="hidden" name="exercise_id" value="<?= $exercise['exercise_id'] ?>">
                                <input type="hidden" name="program_id" value="<?= $program_id ?>">
                                <?php for($i = 1; $i <= $exercise['sets']; $i++)
                                    {
                                ?>
                                    <div class="set-row">
                                        <span>სეტი <?= $i ?></span>
                                        <input type="number" name="weight[]" placeholder="კგ" step="0.5" min="0">
                                        <input type="number" name="reps[]" placeholder="გამეორ." min="0">
                                    </div>
                                <?php 
                                    }
                                 ?>
                                <button type="submit">შენახვა</button>
                            </form>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        <?php 
            } 
        ?>
    </div>
</body>
</html>