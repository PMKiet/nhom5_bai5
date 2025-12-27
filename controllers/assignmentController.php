<?php
require_once __DIR__ . '../../models/AssignmentModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listAssignmentAction()
{
    $assignment = new AssignmentModal();
    $listAssignment = $assignment->getAllAssignment();
    return $listAssignment;
}

function updateAssignment()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $assignmentId = $_POST['assignment-id-edit'] ?? '';
        $teacherId = $_POST['assignment-teacher-edit'] ?? '';
        $classId = $_POST['assignment-class-edit'] ?? '';
        $courseId = $_POST['assignment-course-edit'] ?? '';
        $semestertId = $_POST['assignment-semester-edit'] ?? '';
        $numberOfLession = $_POST['assignment-numberOfLession-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $assignmentModal = new AssignmentModal();
        $assignmentModal->updateAssignment($teacherId, $classId, $courseId, $semestertId, $assignmentId, $numberOfLession);

        header('location: ' . BASE_URL . '/views/assignment');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function addAssignment()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post 
        $teacherId = $_POST['assignment-teacher-add'] ?? '';
        $classId = $_POST['assignment-class-add'] ?? '';
        $courseId = $_POST['assignment-course-add'] ?? '';
        $semestertId = $_POST['assignment-semester-add'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $assignmentModal = new AssignmentModal();
        $assignmentModal->addAssignment($teacherId, $classId, $courseId, $semestertId);

        header('location: ' . BASE_URL . '/views/assignment');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function deleteAssignment()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post 
        $assignmentId = $_POST['assignment-id-delete'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $assignmentModal = new AssignmentModal();
        $assignmentModal->deleteAssignment($assignmentId);

        header('location: ' . BASE_URL . '/views/assignment');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}


if (isset($_POST['action']) && $_POST['action'] === 'update') {
    updateAssignment();
}

if (isset($_POST['action']) && $_POST['action'] === 'add') {
    addAssignment();
}
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    deleteAssignment();
}
