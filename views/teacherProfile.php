<?php
require __DIR__ . '../../controllers/teacherController.php';
$teacher = teacherByIdAccount();
?>

<div class="profile-container">
    <h1>Thông tin giáo viên</h1>
    <div class="info-row student-id">
        <span class="info-label">Mã giáo viên</span>
        <span class="info-value"><?php echo $teacher['ma_giao_vien'] ?></span>
    </div>
    <div class="info-row student-name">
        <span class="info-label">Tên giáo viên</span>
        <span class="info-value"><?php echo $teacher['ten_giao_vien'] ?></span>
    </div>
    <div class="info-row student-dob">
        <span class="info-label">Học hàm</span>
        <span class="info-value"><?php echo $teacher['hoc_ham'] ?></span>
    </div>
    <div class="info-row student-address">
        <span class="info-label">Học vị</span>
        <span class="info-value"><?php echo $teacher['hoc_vi'] ?></span>
    </div>
</div>