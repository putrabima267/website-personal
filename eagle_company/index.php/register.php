<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = cleanInput($_POST['username']);
    $email = cleanInput($_POST['email']);
    $password = md5($_POST['password']); // Gunakan password_hash() untuk production
    $full_name = cleanInput($_POST['full_name']);
    
    // Cek apakah username atau email sudah ada
    $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        echo json_encode(['success' => false, 'message' => 'Username atau email sudah terdaftar!']);
    } else {
        $insert_query = "INSERT INTO users (username, email, password, full_name) VALUES ('$username', '$email', '$password', '$full_name')";
        
        if (mysqli_query($conn, $insert_query)) {
            echo json_encode(['success' => true, 'message' => 'Registrasi berhasil! Silakan login.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Terjadi kesalahan saat registrasi.']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>