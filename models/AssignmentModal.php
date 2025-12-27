<?php
require_once __DIR__ . '/../config/connect.php';

class AssignmentModal
{
    private $conn;
    private $result;
    private $listAssignment = null;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function getAllAssignment()
    {
        $querySelect = "SELECT f_ma_giao_vien, f_ma_lop_hoc, f_ma_hoc_phan, f_ma_hoc_ky, ten_giao_vien, ten_lop_hoc, ten_hoc_phan, ten_hoc_ky FROM phanconggiangday  
            INNER JOIN giaovien ON phanconggiangday.f_ma_giao_vien = giaovien.ma_giao_vien 
            INNER JOIN lophoc ON phanconggiangday.f_ma_lop_hoc = lophoc.ma_lop_hoc 
            INNER JOIN hocphan ON phanconggiangday.f_ma_hoc_phan = hocphan.ma_hoc_phan 
            INNER JOIN hocky ON phanconggiangday.f_ma_hoc_ky = hocky.ma_hoc_ky ";

        $listAssignment = $this->result = $this->conn->query($querySelect);
        $listAssignment = $this->result->fetch_all(MYSQLI_ASSOC);

        return $listAssignment;
    }
}
