<?php
require_once __DIR__ . '../../models/StudentModel.php';
require_once __DIR__ . '../../config/base_url.php';

function listUserAction()
{
    $studentModel = new StudentModel();
    $listStudent = $studentModel->getAllStudent();
    return $listStudent;
}

function updateStudent()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['student-id-edit'] ?? '';
        $name = $_POST['student-name-edit'] ?? '';
        $aaddress = $_POST['student-address-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $studentModel = new StudentModel();
        $studentModel->updateStudent($id, $name, $aaddress);

        header('location: ' . BASE_URL . '/views/student');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateStudent();
}
// class StudentController
// {
//     private $studentModel;
//     function __construct($conn)
//     {
//         $this->studentModel = new StudentModel($conn);
//     }

//     function listUserAction()
//     {
//         $listStudent = $this->studentModel->getAllStudent();
//         return $listStudent;
//         // require_once 'views/student.php';
//     }
// }
