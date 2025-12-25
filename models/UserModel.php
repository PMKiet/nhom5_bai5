<?php
// session_start();
class UserModel
{
    private $conn;
    private $result;
    private $user = null;
    private $role;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findUserByUsername($username)
    {
        if ($username) {
            $queryFindUser =  "SELECT * FROM TaiKhoan WHERE ten_tai_khoan = '$username'";
            $this->result = $this->conn->query($queryFindUser);
            $this->user = $this->result->fetch_assoc();
        }

        return $this->user;
    }
    public function getRoleByUser($user)
    {
        if ($user) {
            $maQuyen = $user['f_ma_quyen'];
            $queryGetRole = "SELECT ten_quyen FROM TaiKhoan INNER JOIN QuyenNguoiDung on QuyenNguoiDung.ma_quyen = TaiKhoan.f_ma_quyen WHERE QuyenNguoiDung.ma_quyen  = $maQuyen";
            $this->result = $this->conn->query($queryGetRole);
            $this->role = $this->result->fetch_assoc();
            // $_SESSION['role'] = $this->result;
        }

        return $this->role;
    }
}
