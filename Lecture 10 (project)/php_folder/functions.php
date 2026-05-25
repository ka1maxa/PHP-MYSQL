<?php
function register_user($connect, $name, $email, $password) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $check = mysqli_query($connect, "SELECT 1 FROM user_credentials WHERE email = '$email' LIMIT 1");
    if (mysqli_fetch_assoc($check)) {
        return "emaili dakavebulia";
    }
    
    mysqli_query($connect, "INSERT INTO users (name) VALUES ('$name')");
    $user_id = mysqli_insert_id($connect);
    mysqli_query($connect, "INSERT INTO user_credentials (user_id, email, password) VALUES ('$user_id', '$email', '$hashed')");
    
    return null;
}

function login_user($connect, $email, $password) {
    $result = mysqli_query($connect, "
        SELECT u.id, u.name, u.role, uc.password 
        FROM user_credentials uc 
        JOIN users u ON uc.user_id = u.id 
        WHERE uc.email = '$email'
        LIMIT 1
    ");
    $user = mysqli_fetch_assoc($result);
    
    if (!$user) {
        return "ar arsebobs";
    }
    
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        return null;
    }
    
    return "error email or passowrd";
}

function get_user($connect, $id) {
    $result = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id' LIMIT 1");
    return mysqli_fetch_assoc($result);
}

function is_admin($connect, $id) {
    $user = get_user($connect, $id);
    return $user['role'] === 'admin';
}
?>