<?php
require_once __DIR__ . '/../config/connect.php';

class PlanModal
{
    private $conn;
    private $result;
    private $listAllPlan;
    private $listAssignment;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function getAllPlan()
    {
        $querySelect = "SELECT ma_ke_hoach, ten_ke_hoach, f_ma_lop_hoc, f_ma_hoc_phan, f_ma_hoc_ky, ten_lop_hoc, ten_hoc_phan, ten_hoc_ky FROM KeHoachDaoTao  
            INNER JOIN lophoc ON KeHoachDaoTao.f_ma_lop_hoc = lophoc.ma_lop_hoc 
            INNER JOIN hocphan ON KeHoachDaoTao.f_ma_hoc_phan = hocphan.ma_hoc_phan 
            INNER JOIN hocky ON KeHoachDaoTao.f_ma_hoc_ky = hocky.ma_hoc_ky ";

        $this->result = $this->conn->query($querySelect);
        $this->listAllPlan = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listAllPlan;
    }

    // function getAssignmentByTeacherId($maGiaoVien)
    // {
    //     $querySelect = "SELECT ma_phan_cong, f_ma_giao_vien, f_ma_lop_hoc, f_ma_hoc_phan, f_ma_hoc_ky, ten_giao_vien, ten_lop_hoc, ten_hoc_phan, ten_hoc_ky, so_tiet FROM phanconggiangday  
    //         INNER JOIN giaovien ON phanconggiangday.f_ma_giao_vien = giaovien.ma_giao_vien 
    //         INNER JOIN lophoc ON phanconggiangday.f_ma_lop_hoc = lophoc.ma_lop_hoc 
    //         INNER JOIN hocphan ON phanconggiangday.f_ma_hoc_phan = hocphan.ma_hoc_phan 
    //         INNER JOIN hocky ON phanconggiangday.f_ma_hoc_ky = hocky.ma_hoc_ky 
    //         WHERE f_ma_giao_vien =  '$maGiaoVien'";

    //     $this->result = $this->conn->query($querySelect);
    //     $this->assignmentByTeacherId = $this->result->fetch_all(MYSQLI_ASSOC);

    //     return $this->assignmentByTeacherId;
    // }

    function updatePlan($planName, $classId, $courseId, $semesterId, $planId)
    {
        $queryUpdate = "UPDATE KeHoachDaoTao SET ten_ke_hoach = '$planName', f_ma_lop_hoc = '$classId', f_ma_hoc_phan = '$courseId', f_ma_hoc_ky = '$semesterId' WHERE ma_ke_hoach = '$planId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    public function addPlan($planName, $classId, $courseId, $semesterId)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "KH" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAdd = "INSERT INTO `KeHoachDaoTao`(`ma_ke_hoach`, `ten_ke_hoach`, `f_ma_lop_hoc`, `f_ma_hoc_phan`, `f_ma_hoc_ky`) VALUES ('$id' ,'$planName','$classId','$courseId', '$semesterId')";

        return $this->result = $this->conn->query($queryAdd);
    }

    function deletePlan($planId)
    {
        $queryDelete = "DELETE FROM `KeHoachDaoTao` WHERE ma_ke_hoach = '$planId'";

        return $this->result = $this->conn->query($queryDelete);
    }
}
