<?php
require_once __DIR__ . '../../models/CourseModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listCourseAction()
{
    $courseModal = new CourseModal();
    $listCourse = $courseModal->getAllCourse();

    return $listCourse;
}

function updateCourseAction()
{
    $courseModal = new CourseModal();
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['course-id-edit'];
        $courseName = $_POST['course-name-edit'];
        $courseUnit = $_POST['course-unit-edit'];

        $courseModal->updateCourseById($id, $courseName, $courseUnit);

        header('location: ' . BASE_URL . '/views/course');
    }
}

function addCourseAction()
{
    $courseModal = new CourseModal();
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $courseName = $_POST['course-name-add'];
        $courseUnit = $_POST['course-unit-add'];

        $courseModal->addCourse($courseName, $courseUnit);

        header('location: ' . BASE_URL . '/views/course');
    }
}

function deleteCourseAction()
{
    $courseModal = new CourseModal();
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $courseId = $_POST['course-id-delete'];

        $courseModal->deleteCourse($courseId);

        header('location: ' . BASE_URL . '/views/course');
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    updateCourseAction();
}

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    addCourseAction();
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    deleteCourseAction();
}
