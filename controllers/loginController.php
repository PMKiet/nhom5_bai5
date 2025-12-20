<?php
session_start();

require __DIR__ . '../../config/base_url.php';

$username = '';
$password = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //lấy username và pass từ method post
    $username = $_POST['username'] ?? 'admin';
    $password = $_POST['passwrod'] ?? '';

    if ($username === 'admin') {
        $_SESSION['username'] = $username; // dùng để lưu đăng nhập
        header('location: ' . BASE_URL . '/');
    } else {
        $error = 'Tài khoản hoặc mật khẩu không đúng';
    }
}

require __DIR__ . '/../views/loginPage.php';
