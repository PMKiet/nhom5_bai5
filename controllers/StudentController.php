<?php
require_once __DIR__ . '../../models/StudentModel.php';
require_once __DIR__ . '../../config/base_url.php';

function listUserAction()
{
    $studentModel = new StudentModel();
    $listStudent = $studentModel->getAllStudent();
    return $listStudent;
}

function studentByIdAccount()
{
    if (isset($_SESSION['idUser'])) {
        $idAccount = $_SESSION['idUser'];
        echo $idAccount;
        $studentModel = new StudentModel();
        $student = $studentModel->getStudentByIdAccount($idAccount);
        return $student;
    }
}

function updateStudent()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['student-id-edit'] ?? '';
        $name = $_POST['student-name-edit'] ?? '';
        $aaddress = $_POST['student-address-edit'] ?? '';
        $idClass = $_POST['student-idClass-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $studentModel = new StudentModel();
        $studentModel->updateStudent($id, $name, $aaddress, $idClass);

        header('location: ' . BASE_URL . '/views/student');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function deleteStudent()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['student-id-delete'];

        $studentModel = new StudentModel();
        $studentModel->deleteStudent($id);
        header('location: ' . BASE_URL . '/views/student');
    }
}

function addStudent()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $birh = $_POST['student-birh-add'] ?? '';
        $name = $_POST['student-name-add'] ?? '';
        $address = $_POST['student-address-add'] ?? '';
        if (!empty($birh) && !empty($name) && !empty($address)) {
            $studentModel = new StudentModel();
            $studentModel->addStudent($name, $address, $birh);
            header('location: ' . BASE_URL . '/views/student');
        } else {
            echo 'thông tin rỗng';
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateStudent();
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    deleteStudent();
}


if (isset($_POST['action']) && $_POST['action'] == 'add') {
    addStudent();
}
