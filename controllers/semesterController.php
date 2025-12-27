<?php
require_once __DIR__ . '../../models/SemesterModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listSemesterAction()
{
    $semesterModal = new SemesterModal();
    $listSemester = $semesterModal->getAllSemester();
    return $listSemester;
}

function listIdAndNameSemesterAction()
{
    $semesterModal = new SemesterModal();
    $listIdAndNameSemester = $semesterModal->getAllSemester();
    return $listIdAndNameSemester;
}

function updateSemesterAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $id = $_POST['semester-id-edit'] ?? '';
        $name = $_POST['semester-name-edit'] ?? '';
        $begin = $_POST['semester-begin-edit'] ?? '';
        $end = $_POST['semester-end-edit'] ?? '';

        $semesterModal = new SemesterModal();
        $semesterModal->updateSemesterById($id, $name, $begin, $end);

        header('location: ' . BASE_URL . '/views/semester');
    }
}

function addSemesterAction()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $name = $_POST['semester-name-add'] ?? '';
        $begin = $_POST['semester-begin-add'] ?? '';
        $end = $_POST['semester-end-add'] ?? '';

        $semesterModal = new SemesterModal();
        $semesterModal->addSemester($name, $begin, $end);

        header('location: ' . BASE_URL . '/views/semester');
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateSemesterAction();
}

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    addSemesterAction();
}
