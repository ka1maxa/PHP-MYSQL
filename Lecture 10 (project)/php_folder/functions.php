<?php
function register_user($connect, $name, $email, $password)
{
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $check = mysqli_query($connect, "SELECT 1 FROM user_credentials WHERE email = '$email' LIMIT 1");
    if (mysqli_fetch_assoc($check))
    {
        return "emaili dakavebulia";
    }
    
    mysqli_query($connect, "INSERT INTO users (name) VALUES ('$name')");
    $user_id = mysqli_insert_id($connect);
    mysqli_query($connect, "INSERT INTO user_credentials (user_id, email, password) VALUES ('$user_id', '$email', '$hashed')");
    
    return null;
}

function login_user($connect, $email, $password)
{
    $result = mysqli_query($connect, "
        SELECT u.id, u.name, u.role, uc.password 
        FROM user_credentials uc 
        JOIN users u ON uc.user_id = u.id 
        WHERE uc.email = '$email'
        LIMIT 1
    ");
    $user = mysqli_fetch_assoc($result);
    
    if (!$user) {
        return "მომხმარებელი ვერ მოიძებნა";
    }
    
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        return null;
    }
    
    return "ემაილი ან პაროლი არასწორია";
}
function get_user($connect, $id) {
    $result = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id' LIMIT 1");
    return mysqli_fetch_assoc($result);
}

function is_admin($connect, $id)
{
    $user = get_user($connect, $id);
    return $user['role'] === 'admin';
}
function get_user_progress($connect, $user_id)
{
    $result = mysqli_query($connect, "
        SELECT 
            e.name as exercise_name,
            ws.date,
            SUM(ws.weight * ws.reps) as total_volume,
            MAX(ws.weight) as max_weight,
            COUNT(ws.id) as total_sets
        FROM workout_sets ws
        JOIN exercises e ON e.id = ws.exercise_id
        WHERE ws.user_id = '$user_id'
        GROUP BY ws.exercise_id, ws.date
        ORDER BY ws.date DESC
    ");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function get_program_stats($connect, $program_id)
{
    $result = mysqli_query($connect, "
        SELECT 
            COUNT(DISTINCT ws.user_id) as total_users,
            COUNT(ws.id) as total_sets,
            MAX(ws.weight) as max_weight,
            AVG(ws.weight) as avg_weight
        FROM workout_sets ws
        WHERE ws.program_id = '$program_id'
    ");
    return mysqli_fetch_assoc($result);
}
?>