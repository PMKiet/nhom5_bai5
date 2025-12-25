<?php
require __DIR__ . '../../models/StudentModel.php';
require __DIR__ . '../../config/connect.php';
require __DIR__ . '../../config/base_url.php';
class StudentController
{
    private $studentModel;
    function __construct($conn)
    {
        $this->studentModel = new StudentModel($conn);
    }

    function listUserAction()
    {
        $listStudent = $this->studentModel->getAllStudent();
        return $listStudent;
        // require_once 'views/student.php';
    }
}
