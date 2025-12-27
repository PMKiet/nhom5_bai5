<?php
require_once __DIR__ . '/../config/connect.php';

class AssignmentModal
{
    private $conn;
    private $result;
    private $listAssignment;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function getAllAssignment()
    {
        $querySelect = "SELECT ma_phan_cong, f_ma_giao_vien, f_ma_lop_hoc, f_ma_hoc_phan, f_ma_hoc_ky, ten_giao_vien, ten_lop_hoc, ten_hoc_phan, ten_hoc_ky, so_tiet FROM phanconggiangday  
            INNER JOIN giaovien ON phanconggiangday.f_ma_giao_vien = giaovien.ma_giao_vien 
            INNER JOIN lophoc ON phanconggiangday.f_ma_lop_hoc = lophoc.ma_lop_hoc 
            INNER JOIN hocphan ON phanconggiangday.f_ma_hoc_phan = hocphan.ma_hoc_phan 
            INNER JOIN hocky ON phanconggiangday.f_ma_hoc_ky = hocky.ma_hoc_ky ";

        $this->result = $this->conn->query($querySelect);
        $this->listAssignment = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listAssignment;
    }

    function updateAssignment($teacherId, $classId, $courseId, $semesterId, $assignmentId, $numberOfLession)
    {
        $queryUpdate = "UPDATE PhanCongGiangDay SET f_ma_giao_vien = '$teacherId', f_ma_lop_hoc = '$classId', f_ma_hoc_phan = '$courseId', f_ma_hoc_ky = '$semesterId', so_tiet = '$numberOfLession' WHERE ma_phan_cong = '$assignmentId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    public function addAssignment($teacherId, $classId, $courseId, $semesterId)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "PC" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAdd = "INSERT INTO `PhanCongGiangDay`(`ma_phan_cong`, `f_ma_giao_vien`,`f_ma_lop_hoc`, `f_ma_hoc_phan`, `f_ma_hoc_ky`) VALUES ('$id' ,'$teacherId','$classId','$courseId', '$semesterId')";

        return $this->result = $this->conn->query($queryAdd);
    }

    function deleteAssignment($assignmentId)
    {
        $queryDelete = "DELETE FROM `PhanCongGiangDay` WHERE ma_phan_cong = '$assignmentId'";

        return $this->result = $this->conn->query($queryDelete);
    }
}
