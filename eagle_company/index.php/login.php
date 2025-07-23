<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = cleanInput($_POST['username']);
    $password = md5($_POST['password']); // Gunakan password_hash() untuk production
    
    $query = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        
        echo json_encode(['success' => true, 'message' => 'Login berhasil!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Username atau password salah!']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>