<?php
$role = $_SESSION['role'];
?>

<body>
    <div class="nav">
        <div>
            <div class="nav-top">
                <img src="<?= BASE_URL ?>/public/assets/img/Ellipse 6.png">
                <span>Nhóm 5</span>
            </div>
            <ul>
                <!-- chỉ admin mới xem -->
                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/student">
                            Học sinh
                        </a>
                    </li>
                <?php endif ?>



                <!-- chỉ admin mới xem -->
                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/teacher">
                            Giáo viên
                        </a>
                    </li>
                <?php endif ?>

                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/class">
                            Lớp
                        </a>
                    </li>
                <?php endif ?>

                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/course">
                            Học phần
                        </a>
                    </li>
                <?php endif ?>

                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/assignment">
                            Phân công giảng dạy
                        </a>
                    </li>
                <?php endif ?>

                <?php if ($role == 'admin'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/semester">
                            Học kỳ
                        </a>
                    </li>
                <?php endif ?>


                <!-- chỉ sinh vien mới xem -->
                <?php if ($role == 'student'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/studentprofile">
                            Học sinh
                        </a>
                    </li>
                <?php endif ?>

                <!-- chỉ sinh vien mới xem -->
                <?php if ($role == 'student'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/courseforstudent">
                            Học phần
                        </a>
                    </li>
                <?php endif ?>

                <!-- chỉ giáo vien mới xem -->
                <?php if ($role == 'teacher'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/teacherprofile">
                            Giáo viên
                        </a>
                    </li>
                <?php endif ?>
                <!-- chỉ giáo vien mới xem -->
                <?php if ($role == 'teacher'): ?>
                    <li>
                        <img src="<?= BASE_URL ?>/public/assets/img/home-2.png" alt="">
                        <a href="<?= BASE_URL ?>/views/teacherassignment">
                            Phân công giảng dạy
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>



        <a href="<?= BASE_URL ?>/controllers/logout.php" class="logout">
            Đăng xuất
        </a>
    </div>
</body>