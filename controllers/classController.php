<?php
require_once __DIR__ . '../../models/ClassModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listClassAction()
{
    $classModal = new ClassModal();
    $listClass = $classModal->getAllClass();
    return $listClass;
}

function listIdClassAction()
{
    $classModal = new ClassModal();
    $listIdClass = $classModal->getIdClass();
    return $listIdClass;
}

function updateClass()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['class-id-edit'] ?? '';
        $name = $_POST['class-name-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $classModal = new ClassModal();
        $classModal->updateClass($id, $name);

        header('location: ' . BASE_URL . '/views/class');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

// function deleteStudent()
// {
//     if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
//         $id = $_POST['student-id-delete'];

//         $studentModel = new StudentModel();
//         $studentModel->deleteStudent($id);
//         header('location: ' . BASE_URL . '/views/student');
//     }
// }

// function addStudent()
// {
//     if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
//         $birh = $_POST['student-birh-add'] ?? '';
//         $name = $_POST['student-name-add'] ?? '';
//         $address = $_POST['student-address-add'] ?? '';
//         if (!empty($birh) && !empty($name) && !empty($address)) {
//             $studentModel = new StudentModel();
//             $studentModel->addStudent($name, $address, $birh);
//             header('location: ' . BASE_URL . '/views/student');
//         } else {
//             echo 'thông tin rỗng';
//         }
//     }
// }

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateClass();
}

// if (isset($_POST['action']) && $_POST['action'] == 'delete') {
//     deleteStudent();
// }


// if (isset($_POST['action']) && $_POST['action'] == 'add') {
//     addStudent();
// }
