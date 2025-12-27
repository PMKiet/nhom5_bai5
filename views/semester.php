<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/semesterController.php';
// $controller = geta;
$listSemester = listSemesterAction();
?>

<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn" onclick="openFormAdd()">Thêm Học kỳ</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm sinh viên bằng tên.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listSemester;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listSemester, function ($semester) use ($keyword) {
                    // return ($class['ten_lop_hoc'] == $keyword);
                    return (stristr($semester['ten_hoc_ky'], $keyword));
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã học kỳ</th>
                    <th>Tên học kỳ</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_hoc_ky'] ?></th>
                        <th><?php echo $row['ten_hoc_ky'] ?></th>
                        <th><?php echo $row['thoi_gian_bat_dau'] ?></th>
                        <th><?php echo $row['thoi_gian_ket_thuc'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_hoc_ky'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>'
                                                        , '<?php echo $row['thoi_gian_bat_dau'] ?>'
                                                        , '<?php echo $row['thoi_gian_ket_thuc'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick="openFormEdit('<?php echo $row['ma_hoc_ky'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>'
                                                        , '<?php echo $row['thoi_gian_bat_dau'] ?>'
                                                        , '<?php echo $row['thoi_gian_ket_thuc'] ?>')">
                                Sửa</span>
                            <!--
                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_sinh_vien'] ?>'
                                                        ,'<?php echo $row['ten_sinh_vien'] ?>')">
                                Xóa</span> -->
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
        <h3>Xem lớp</h3>
        <p><span>Mã học kỳ:</span> <strong id="semester-id"></strong></p>
        <p><span>Tên học kỳ:</span> <strong id="semester-name"></strong> </p>
        <p><span>Bắt đầu:</span> <strong id="semester-begin"></strong></p>
        <p><span>Kết thúc:</span> <strong id="semester-end"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/semesterController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa học kỳ</h3>
        <p><span>Mã học kỳ:</span><input id="semester-id-edit" name="semester-id-edit" readonly /></p>
        <p><span>Tên học kỳ:</span><input id="semester-name-edit" name="semester-name-edit" /></p>
        <p><span>Bắt đầu:</span><input type="date" id="semester-begin-edit" name="semester-begin-edit" /></p>
        <p><span>Kết thúc:</span><input type="date" id="semester-end-edit" name="semester-end-edit" /></p>
        <!-- <p><span>Địa chỉ:</span> <input id="student-address-edit" name="student-address-edit" /></p> -->
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<!-- <form method="POST" action="../controllers/StudentController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Sửa sinh viên</h3>
        <p><span>Mã sinh viên:</span> <input id="student-id-delete" name="student-id-delete" readonly /></p>
        <p><span>Tên sinh viên:</span><input id="student-name-delete" name="student-name-delete" /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form> -->

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/semesterController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm học kỳ</h3>

        <p><span>Tên học kỳ:</span> <input class="input-form" id="semester-name-add" name="semester-name-add" require /></p>
        <p><span>Bắt đầu:</span> <input type="date" class="input-form" id="semester-begin-add" name="semester-begin-add" require /></p>
        <p><span>Kết thúc:</span> <input type="date" class="input-form" id="semester-end-add" name="semester-end-add" require /></p>

        <button type="submit" class="btn add-class">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormSemester.js"></script>