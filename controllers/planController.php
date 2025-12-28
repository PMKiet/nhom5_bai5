<?php
require_once __DIR__ . '../../models/PlanModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listPlanAction()
{
    $planModal = new PlanModal();
    $listAllPlan = $planModal->getAllPlan();
    return $listAllPlan;
}



function updatePlan()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post
        $planId = $_POST['plan-id-edit'] ?? '';
        $planName = $_POST['plan-name-edit'] ?? '';
        $classId = $_POST['plan-class-edit'] ?? '';
        $courseId = $_POST['plan-course-edit'] ?? '';
        $semestertId = $_POST['plan-semester-edit'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $planModal = new PlanModal();
        $planModal->updatePlan($planName, $classId, $courseId, $semestertId, $planId,);

        header('location: ' . BASE_URL . '/views/plan');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function addPlan()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post 
        $name = $_POST['plan-name-add'] ?? '';
        $classId = $_POST['plan-class-add'] ?? '';
        $courseId = $_POST['plan-course-add'] ?? '';
        $semestertId = $_POST['plan-semester-add'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $planModal = new PlanModal();
        $planModal->addPlan($name, $classId, $courseId, $semestertId);

        header('location: ' . BASE_URL . '/views/plan');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}

function deletePlan()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        //lấy username và pass từ method post 
        $planId = $_POST['plan-id-delete'] ?? '';

        // if ($name !== "" && $aaddress !== "") {
        $planModal = new PlanModal();
        $planModal->deletePlan($planId);

        header('location: ' . BASE_URL . '/views/plan');
        // } else {
        //     $error = 'Tài khoản và mật khẩu không được bỏ trống';
        // }
    }
}


if (isset($_POST['action']) && $_POST['action'] === 'update') {
    updatePlan();
}

if (isset($_POST['action']) && $_POST['action'] === 'add') {
    addPlan();
}
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    deletePlan();
}
