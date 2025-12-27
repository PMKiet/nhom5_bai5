<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/classController.php';
// $controller = geta;
$listClass = listClassAction();
?>

<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn" onclick="openFormAdd()">Thêm sinh viên</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm sinh viên bằng tên.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listClass;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listClass, function ($class) use ($keyword) {
                    return ($class['ten_lop_hoc'] == $keyword);
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã lớp học</th>
                    <th>Tên lớp học</th>
                    <th>Hệ đào tạo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_lop_hoc'] ?></th>
                        <th><?php echo $row['ten_lop_hoc'] ?></th>
                        <th><?php echo $row['he_dao_tao'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_lop_hoc'] ?>'
                                                        , '<?php echo $row['ten_lop_hoc'] ?>'
                                                        , '<?php echo $row['he_dao_tao'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick="openFormEdit('<?php echo $row['ma_lop_hoc'] ?>'
                                                        ,'<?php echo $row['ten_lop_hoc'] ?>')">
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
        <p><span>Mã lớp học:</span> <strong id="class-id"></strong></p>
        <p><span>Tên lớp học:</span> <strong id="class-name"></strong> </p>
        <p><span>Hệ đào tạo:</span> <strong id="class-training"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/classController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa lớp học</h3>
        <p><span>Mã lớp học:</span><input id="class-id-edit" name="class-id-edit" readonly /></p>
        <p><span>Tên lớp học:</span><input id="class-name-edit" name="class-name-edit" /></p>
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
<!-- <form method="POST" action="../controllers/StudentController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm sinh viên</h3>

        <p><span>Tên sinh viên:</span> <input class="input-form" id="student-name-add" name="student-name-add" require /></p>
        <p><span>Địa chỉ:</span> <input class="input-form" id="student-address-add" name="student-address-add" require /></p>
        <p><span>Ngày sinh:</span> <input class="input-form" type="date" id="student-birh-add" name="student-birh-add" require /></p>

        <button type="submit" class="btn add-student">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form> -->

<script src="../public/assets/js/popupFormClass.js"></script>