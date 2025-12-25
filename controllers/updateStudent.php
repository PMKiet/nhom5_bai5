<?php
require __DIR__ . '../../models/StudentModel.php';
require __DIR__ . '../../config/connect.php';
require __DIR__ . '../../config/base_url.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //lấy username và pass từ method post
    $id = $_POST['student-id-edit'] ?? '';
    $name = $_POST['student-name-edit'] ?? '';
    $aaddress = $_POST['student-address-edit'] ?? '';

    // if ($name !== "" && $aaddress !== "") {
    $studentModel = new StudentModel($conn);
    $studentModel->updateStudent($id, $name, $aaddress);

    header('location: ' . BASE_URL . '/');
    // } else {
    //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
    // }
}
