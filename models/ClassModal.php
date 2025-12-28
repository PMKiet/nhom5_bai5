<?php
require_once __DIR__ . '/../config/connect.php';

class ClassModal
{
    private $conn;
    private $result;
    private $listClass = null;
    private $listIdClass = null;

    public function __construct()
    {
        $this->conn  = connectDB();
    }

    //=========
    public function getAllClass()
    {

        $querygetAllClass = "SELECT * FROM LopHoc";
        $this->result = $this->conn->query($querygetAllClass);
        $this->listClass = $this->result->fetch_all(MYSQLI_ASSOC); // lấy toàn bô user, fetch_assoc() chỉ lấy 1 dòng di nhất

        return $this->listClass;
    }

    public function getIdAndNameClass()
    {
        $queryGetIdClass = "SELECT ma_lop_hoc, ten_lop_hoc FROM LopHoc";
        $this->result = $this->conn->query($queryGetIdClass);
        $this->listIdClass = $this->result->fetch_all(MYSQLI_ASSOC);

        return $this->listIdClass;
    }

    //=========
    public function updateClass($classId, $className)
    {
        $queryUpdate = "UPDATE LopHoc SET ten_lop_hoc = '$className' WHERE ma_lop_hoc = '$classId'";
        echo $queryUpdate;
        return $this->result = $this->conn->query($queryUpdate);
    }

    //=========
    public function deleteClass($classId)
    {
        $queryDelete = "DELETE FROM LopHoc WHERE ma_lop_hoc = '$classId'";
        echo $queryDelete;
        $this->result = $this->conn->query($queryDelete);

        return $this->result;
    }

    //=========
    public function addClass($classtName, $classTraining)
    {
        $randomId = rand(1, 9999);
        $autoFillZero = str_pad($randomId, 4, 0, STR_PAD_LEFT); //tự động thêm 0 cho đủ 4 số
        $id = "LH" . date("y") . $autoFillZero; // date("y") lấy 2 số cuối của năm
        $queryAdd = "INSERT INTO `LopHoc`(`ma_lop_hoc`,`ten_lop_hoc`, `he_dao_tao`) VALUES ('$id' ,'$classtName','$classTraining')";

        return $this->result = $this->conn->query($queryAdd);
    }
}
