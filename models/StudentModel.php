<?php
require_once __DIR__ . '/../config/connect.php';

class StudentModel
{
    private $conn;
    private $result;
    private $listStudent = null;

    public function __construct()
    {
        $this->conn  = connectDB();
    }

    //=========
    public function getAllStudent()
    {

        $queryGetAllStudent = "SELECT * FROM SinhVien";
        $this->result = $this->conn->query($queryGetAllStudent);
        $this->listStudent = $this->result->fetch_all(MYSQLI_ASSOC); // lấy toàn bô user, fetch_assoc() chỉ lấy 1 dòng di nhất

        return $this->listStudent;
    }

    //=========
    public function updateStudent($studentId, $studentName, $studentAddress, $idClass)
    {
        $queryUpdate = "UPDATE SinhVien SET ten_sinh_vien = '$studentName', dia_chi = '$studentAddress', f_ma_lop_hoc = '$idClass' WHERE ma_sinh_vien = '$studentId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    //=========
    public function deleteStudent($studentId)
    {
        $queryDelete = "DELETE FROM sinhvien WHERE ma_sinh_vien = '$studentId'";
        echo $queryDelete;
        $this->result = $this->conn->query($queryDelete);
        if ($this->result === true) {
            $queryDeleteAccount = "DELETE FROM TaiKhoan WHERE ten_tai_khoan = '$studentId'";
            $this->conn->query($queryDeleteAccount);
        }
        return $this->result;
    }

    //=========
    public function addStudent($studentName, $studentAddress, $studentBirh)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "SV" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAdd = "INSERT INTO `sinhvien`(`ma_sinh_vien`,`ten_sinh_vien`, `ngay_sinh`, `dia_chi`) VALUES ('$id' ,'$studentName','$studentBirh','$studentAddress')";

        $this->result = $this->conn->query($queryAdd);

        if ($this->result === true) {
            $idAccount = str_pad($randomId, 4, '0', STR_PAD_LEFT);
            $queryCreateAccount = "INSERT INTO `TaiKhoan`(`ma_tai_khoan`,`ten_tai_khoan`, `mat_khau`,`f_ma_quyen`) VALUES ('$idAccount' ,'$id','123@', '3')";
            $this->conn->query($queryCreateAccount);
        }
        if ($this->result === true) {
            $queryAddId = "UPDATE  `SinhVien` SET f_ma_tai_khoan = '$idAccount' WHERE ma_sinh_vien = '$id'";
            $this->result = $this->conn->query($queryAddId);
        }

        return $this->result;
    }
}
