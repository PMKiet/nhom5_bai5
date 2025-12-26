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
}
