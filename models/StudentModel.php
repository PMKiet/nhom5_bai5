<?php

class StudentModel
{
    private $conn;
    private $result;
    private $listStudent = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
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

        return $this->result = $this->conn->query($queryUpdate);
    }
}
