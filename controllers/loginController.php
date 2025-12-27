<?php
session_start();

require __DIR__ . '../../config/base_url.php';
require __DIR__ . '../../models/userModel.php';

$username = '';
$password = '';
$error = '';
$userModel = '';
$user = null;

// $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
// if ($pageRefreshed == 1) {
//     header('location: ' . BASE_URL . '/views/login');
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo 123;
    //lấy username và pass từ method post
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username !== "" && $password !== "") {
        $userModel = new UserModel();
        $user = $userModel->findUserByUsername($username);

        if ($user !== null) {
            if ($username === $user['ten_tai_khoan'] && $password === $user['mat_khau']) {
                $_SESSION['username'] = $username; // dùng để lưu đăng nhập
                $role = $userModel->getRoleByUser($user);

                $_SESSION['idUser'] = $user['ma_tai_khoan'];
                $_SESSION['role'] = $role['ten_quyen'];
                if ($role['ten_quyen'] === 'admin') {
                    header('location: ' . BASE_URL . '/views/student');
                } else if ($role['ten_quyen'] === 'student') {
                    header('location: ' . BASE_URL . '/views/studentprofile');
                }
            } else {
                $error = 'Tài khoản hoặc mật khẩu không đúng';
            }
        } else {
            $error = 'Tài khoản hoặc mật khẩu không đúng';
        }
    } else {
        $error = 'Tài khoản và mật khẩu không được bỏ trống';
    }
}
require __DIR__ . '/../views/loginPage.php';
