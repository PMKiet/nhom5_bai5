<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/courseController.php';
// $controller = geta;
$listCourse = listCourseAction();
?>

<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn" onclick="openFormAdd()">Thêm học phần</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm sinh viên bằng tên.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listCourse;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listCourse, function ($course) use ($keyword) {
                    return (strstr($course['ten_hoc_phan'], $keyword));
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã học phấn</th>
                    <th>Tên học phần</th>
                    <th>Đơn vị học trình</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['don_vi_hoc_trinh'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_hoc_phan'] ?>'
                                                        , '<?php echo $row['ten_hoc_phan'] ?>'
                                                        , '<?php echo $row['don_vi_hoc_trinh'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick="openFormEdit('<?php echo $row['ma_hoc_phan'] ?>'
                                                        ,'<?php echo $row['ten_hoc_phan'] ?>'
                                                        ,'<?php echo $row['don_vi_hoc_trinh'] ?>')">
                                Sửa</span>

                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_hoc_phan'] ?>'
                                                        ,'<?php echo $row['ten_hoc_phan'] ?>')">
                                Xóa</span>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>

<!-- form xem class -->
<div id="popupForm-view" class="modal">
    <div class="modal-content">
        <h3>Xem hoc phần</h3>
        <p><span>Mã học phần:</span> <strong id="course-id"></strong></p>
        <p><span>Tên học phần:</span> <strong id="course-name"></strong> </p>
        <p><span>Đơn vị học trình:</span> <strong id="course-unit"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/courseController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa học phần</h3>
        <p><span>Mã học phần:</span><input id="course-id-edit" name="course-id-edit" readonly /></p>
        <p><span>Tên học phần:</span><input id="course-name-edit" name="course-name-edit" /></p>
        <p><span>Đơn vị học trình:</span><input id="course-unit-edit" name="course-unit-edit"></input></p>
        <!-- <p><span>Địa chỉ:</span> <input id="student-address-edit" name="student-address-edit" /></p> -->
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/courseController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa học phần</h3>
        <p><span>Mã học phần:</span> <input id="course-id-delete" name="course-id-delete" readonly /></p>
        <p><span>Tên học phần:</span><input id="course-name-delete" name="course-name-delete" readonly /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/courseController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm học phần</h3>

        <p><span>Tên học phần:</span> <input class="input-form" id="course-name-add" name="course-name-add" require /></p>
        <p><span>Đơn vị học trình:</span> <input class="input-form" type="number" id="course-unit-add" name="course-unit-add" require /></p>

        <button type="submit" class="btn add-course">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormCourse.js"></script>