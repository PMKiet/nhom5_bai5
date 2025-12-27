<?php
require_once __DIR__ . '/../config/connect.php';

class SemesterModal
{
    private $conn;
    private $result;
    private $listSemester = null;
    private $listIdAndNameSemester = null;

    public function __construct()
    {
        $this->conn  = connectDB();
    }

    function getAllSemester()
    {
        $queryGetAllSemester = "SELECT ma_hoc_ky, ten_hoc_ky, thoi_gian_bat_dau, thoi_gian_ket_thuc FROM HocKy";
        $this->result = $this->conn->query($queryGetAllSemester);
        $this->listSemester = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listSemester;
    }

    function getIdAndNameSemester()
    {
        $queryGetCourse = "SELECT ma_hoc_ky, ten_hoc_ky FROM HocKy";
        $this->result = $this->conn->query($queryGetCourse);
        $this->listIdAndNameSemester = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listIdAndNameSemester;
    }


    function updateSemesterById($id, $semesterName, $semesterBegin, $semesterEnd)
    {
        $queryUpdate = "UPDATE HocKy SET ten_hoc_ky = '$semesterName', thoi_gian_bat_dau = '$semesterBegin', thoi_gian_ket_thuc = '$semesterEnd' WHERE ma_hoc_ky = '$id'";
        return $this->result = $this->conn->query($queryUpdate);
    }

    function addSemester($semesterName, $semesterBegin, $semesterEnd)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "HK" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAddSemester = "INSERT INTO `HocKy`(`ma_hoc_ky`,`ten_hoc_ky`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`) VALUES ('$id' ,'$semesterName','$semesterBegin', '$semesterEnd')";

        return $this->result = $this->conn->query($queryAddSemester);
    }

    // function deleteCourse($courseId)
    // {
    //     $queryDeleteCourse = "DELETE FROM `HocPhan` WHERE ma_hoc_phan = '$courseId'";

    //     return $this->result = $this->conn->query($queryDeleteCourse);
    // }
}
