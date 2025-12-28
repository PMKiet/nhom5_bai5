<?php
require_once __DIR__ . '/../config/connect.php';

class TeacherModal
{
    private $conn;
    private $result;
    private $listTeacher = null;
    private $listIdAndNameTeacher = null;
    private $teacher;

    public function __construct()
    {
        $this->conn  = connectDB();
    }

    //=========
    public function getAllTeacher()
    {

        $queryGetAllTeacher = "SELECT * FROM GiaoVien";
        $this->result = $this->conn->query($queryGetAllTeacher);
        $this->listTeacher = $this->result->fetch_all(MYSQLI_ASSOC); // lấy toàn bô user, fetch_assoc() chỉ lấy 1 dòng di nhất

        return $this->listTeacher;
    }

    public function getTeacherByIdAccount($idAccount)
    {
        $queryGetStudentByIdAccount = "SELECT * FROM GiaoVien WHERE f_ma_tai_khoan = '$idAccount'";
        $this->result = $this->conn->query($queryGetStudentByIdAccount);
        $this->teacher = $this->result->fetch_assoc(); // lấy toàn bô user, fetch_assoc() chỉ lấy 1 dòng di nhất

        return $this->teacher;
    }

    public function getIdAndNameTeacher()
    {
        $queryGetIdClass = "SELECT ma_giao_vien, ten_giao_vien FROM GiaoVien";
        $this->result = $this->conn->query($queryGetIdClass);
        $this->listIdAndNameTeacher = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listIdAndNameTeacher;
    }

    //=========
    public function updateTeacher($teacherId, $teacherName, $teacherRank, $teacherDegree)
    {
        $queryUpdate = "UPDATE GiaoVien SET ten_giao_vien = '$teacherName', hoc_ham = '$teacherRank', hoc_vi = '$teacherDegree' WHERE ma_giao_vien = '$teacherId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    //=========
    public function deleteTeacher($teacherId)
    {
        $queryDelete = "DELETE FROM GiaoVien WHERE ma_giao_vien = '$teacherId'";
        echo $queryDelete;
        $this->result = $this->conn->query($queryDelete);
        if ($this->result === true) {
            $queryDeleteAccount = "DELETE FROM TaiKhoan WHERE ten_tai_khoan = '$teacherId'";
            $this->conn->query($queryDeleteAccount);
        }
        return $this->result;
    }

    //=========
    public function addTeacher($teacherName, $teacherRank, $teacherDegree)
    {
        $idAccount = "";
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "GV" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAdd = "INSERT INTO `GiaoVien`(`ma_giao_vien`,`ten_giao_vien`, `hoc_ham`, `hoc_vi`) VALUES ('$id' ,'$teacherName','$teacherRank','$teacherDegree')";

        $this->result = $this->conn->query($queryAdd);

        if ($this->result === true) {
            $idAccount = str_pad($randomId, 4, '0', STR_PAD_LEFT);
            $queryCreateAccount = "INSERT INTO `TaiKhoan`(`ma_tai_khoan`,`ten_tai_khoan`, `mat_khau`,`f_ma_quyen`) VALUES ('$idAccount' ,'$id','123@', '2')";
            $this->result = $this->conn->query($queryCreateAccount);
            //thêm mã tài khoản vào lại giáo viên
        }

        if ($this->result === true) {
            $queryAddId = "UPDATE  `GiaoVien` SET f_ma_tai_khoan = '$idAccount' WHERE ma_giao_vien = '$id'";
            $this->result = $this->conn->query($queryAddId);
        }

        return $this->result;
    }
}
