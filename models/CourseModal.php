<?php
require_once __DIR__ . '/../config/connect.php';

class CourseModal
{
    private $conn;
    private $result;
    private $listCourse = null;
    private $listIdAndNameCourse = null;

    public function __construct()
    {
        $this->conn  = connectDB();
    }

    function getAllCourse()
    {
        $queryGetAllCourse = "SELECT ma_hoc_phan, ten_hoc_phan, don_vi_hoc_trinh FROM HocPhan";
        $this->result = $this->conn->query($queryGetAllCourse);
        $this->listCourse = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listCourse;
    }

    function getIdAndNameCourse()
    {
        $queryGetCourse = "SELECT ma_hoc_phan, ten_hoc_phan FROM HocPhan";
        $this->result = $this->conn->query($queryGetCourse);
        $this->listIdAndNameCourse = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listIdAndNameCourse;
    }


    function updateCourseById($id, $courseName, $courseUnit)
    {
        $queryUpdate = "UPDATE HocPhan SET ten_hoc_phan = '$courseName', don_vi_hoc_trinh = '$courseUnit' WHERE ma_hoc_phan = '$id'";
        return $this->result = $this->conn->query($queryUpdate);
    }

    function addCourse($courseName, $courseUnit)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "HP" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAddCourse = "INSERT INTO `HocPhan`(`ma_hoc_phan`,`ten_hoc_phan`, `don_vi_hoc_trinh`) VALUES ('$id' ,'$courseName','$courseUnit')";

        return $this->result = $this->conn->query($queryAddCourse);
    }

    function deleteCourse($courseId)
    {
        $queryDeleteCourse = "DELETE FROM `HocPhan` WHERE ma_hoc_phan = '$courseId'";

        return $this->result = $this->conn->query($queryDeleteCourse);
    }
}
