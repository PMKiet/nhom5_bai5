<?php

class UserModel
{
    private $conn;
    private $result;
    private $user;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findUserByUsername($username)
    {
        if ($username) {
            $queryFindUser =  "SELECT ma_tai_khoan, ten_tai_khoan, mat_khau FROM TaiKhoan WHERE ten_tai_khoan = '$username'";
            $this->result = $this->conn->query($queryFindUser);
            $this->user = $this->result->fetch_assoc();
        }

        return $this->user;
    }
}
