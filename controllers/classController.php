<?php
require_once __DIR__ . '../../models/ClassModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listClassAction()
{
    $classModal = new ClassModal();
    $listClass = $classModal->getAllClass();
    return $listClass;
}

function listIdAndNameClassAction()
{
    $classModal = new ClassModal();
    $listIdClass = $classModal->getIdAndNameClass();
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

function deleteClass()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['class-id-delete'];

        $classModal = new ClassModal();
        $classModal->deleteClass($id);
        header('location: ' . BASE_URL . '/views/class');
    }
}

function addClassAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['class-name-add'] ?? '';
        $training = $_POST['class-training-add'] ?? '';
        if (!empty($name) && !empty($training)) {
            $classModal = new ClassModal();
            $classModal->addClass($name, $training);
            header('location: ' . BASE_URL . '/views/class');
        } else {
            echo 'thông tin rỗng';
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateClass();
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    deleteClass();
}


if (isset($_POST['action']) && $_POST['action'] == 'add') {
    addClassAction();
}
