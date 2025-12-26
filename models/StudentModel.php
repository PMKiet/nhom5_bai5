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

    public function getAllStudent()
    {

        $queryGetAllStudent = "SELECT * FROM SinhVien";
        $this->result = $this->conn->query($queryGetAllStudent);
        $this->listStudent = $this->result->fetch_all(MYSQLI_ASSOC); // lấy toàn bô user, fetch_assoc() chỉ lấy 1 dòng di nhất

        return $this->listStudent;
    }

    public function updateStudent($studentId, $studentName, $studentAddress)
    {
        $queryUpdate = "UPDATE SinhVien SET ten_sinh_vien = '$studentName', dia_chi = '$studentAddress' WHERE ma_sinh_vien = '$studentId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    public function deleteStudent($studentId)
    {
        $queryDelete = "DELETE FROM sinhvien WHERE ma_sinh_vien = '$studentId'";
        echo $queryDelete;
        return $this->result = $this->conn->query($queryDelete);
    }

    public function addStudent($studentName, $studentAddress, $studentBirh)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "SV" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryDelete = "INSERT INTO `sinhvien`(`ma_sinh_vien`,`ten_sinh_vien`, `ngay_sinh`, `dia_chi`) VALUES ('$id' ,'$studentName','$studentBirh','$studentAddress')";
        echo $queryDelete;
        return $this->result = $this->conn->query($queryDelete);
    }

    // public function searchStudent($studentName)
    // {
    //     $randomId = rand(1, 9999);
    //     $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
    //     $id = "SV" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
    //     $querySearch =  "";
    //     echo $queryDelete;
    //     return $this->result = $this->conn->query($queryDelete);
    // }
}
