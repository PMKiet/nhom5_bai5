<?php
require_once __DIR__ . '../../models/TeacherModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listTeacherAction()
{
    $teacherModal = new TeacherModal();
    $listTeacher = $teacherModal->getAllTeacher();
    return $listTeacher;
}

function listIdAndNameTeacherAction()
{
    $teacherModal = new TeacherModal();
    $listIdAndNameTeacher = $teacherModal->getIdAndNameTeacher();
    return $listIdAndNameTeacher;
}

function teacherByIdAccount()
{
    if (isset($_SESSION['idUser'])) {
        $idAccount = $_SESSION['idUser'];
        $teacherModal = new TeacherModal();
        $teacher = $teacherModal->getTeacherByIdAccount($idAccount);
        return $teacher;
    }
}

function updateTeacherAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['teacher-id-edit'] ?? '';
        $name = $_POST['teacher-name-edit'] ?? '';
        $rank = $_POST['teacher-rank-edit'] ?? '';
        $degree = $_POST['teacher-degree-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $teacherModal = new TeacherModal();
        $teacherModal->updateTeacher($id, $name, $rank, $degree);

        header('location: ' . BASE_URL . '/views/teacher');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function addTeacherAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $name = $_POST['teacher-name-add'] ?? '';
        $rank = $_POST['teacher-rank-add'] ?? '';
        $degree = $_POST['teacher-degree-add'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $teacherModal = new TeacherModal();
        $teacherModal->addTeacher($name, $rank, $degree);

        header('location: ' . BASE_URL . '/views/teacher');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function deleteTeacherAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['teacher-id-delete'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $teacherModal = new TeacherModal();
        $teacherModal->deleteTeacher($id);

        header('location: ' . BASE_URL . '/views/teacher');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateTeacherAction();
}

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    addTeacherAction();
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    deleteTeacherAction();
}
