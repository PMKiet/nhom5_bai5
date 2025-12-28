<?php
require __DIR__ . '../../controllers/studentController.php';
$student =  studentByIdAccount();
echo $_SESSION['idUser'];

?>

<div class="profile-container">
    <h1>Thông tin sinh viên</h1>
    <div class="info-row student-id">
        <span class="info-label">Mã sinh viên</span>
        <span class="info-value"><?php echo $student['ma_sinh_vien'] ?></span>
    </div>
    <div class="info-row student-name">
        <span class="info-label">Tên sinh viên</span>
        <span class="info-value"><?php echo $student['ten_sinh_vien'] ?></span>
    </div>
    <div class="info-row student-dob">
        <span class="info-label">Ngày sinh</span>
        <span class="info-value"><?php echo $student['ngay_sinh'] ?></span>
    </div>
    <div class="info-row student-address">
        <span class="info-label">Địa chỉ</span>
        <span class="info-value"><?php echo $student['dia_chi'] ?></span>
    </div>
    <div class="info-row student-class">
        <span class="info-label">Lớp</span>
        <span class="info-value"><?php echo $student['ten_lop_hoc'] ?></span>
    </div>
</div>