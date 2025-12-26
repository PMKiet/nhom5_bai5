<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/StudentController.php';
// $controller = geta;
$listStudent = listUserAction();
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
        $filter = $listStudent;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listStudent, function ($student) use ($keyword) {
                    return ($student['ten_sinh_vien'] == $keyword);
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Địa chỉ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_sinh_vien'] ?></th>
                        <th><?php echo $row['ten_sinh_vien'] ?></th>
                        <th><?php echo $row['f_ma_lop_hoc'] ?></th>
                        <th><?php echo $row['dia_chi'] ?></th>
                        <th>

                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_sinh_vien'] ?>'
                                                        , '<?php echo $row['ten_sinh_vien'] ?>'
                                                        , '<?php echo $row['f_ma_lop_hoc'] ?>'
                                                        , '<?php echo $row['dia_chi'] ?>')">
                                Xem</span>
                            <span class="th-icon th-icon-edit"
                                onclick="openFormEdit('<?php echo $row['ma_sinh_vien'] ?>'
                                                        ,'<?php echo $row['ten_sinh_vien'] ?>'
                                                        , '<?php echo $row['dia_chi'] ?>')">
                                Sửa</span>
                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_sinh_vien'] ?>'
                                                        ,'<?php echo $row['ten_sinh_vien'] ?>')">
                                Xóa</span>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>

<!-- form xem sinh vieen -->
<div id="popupForm-view" class="modal">
    <div class="modal-content">
        <h3>Xem sinh viên</h3>
        <p>Mã sinh viên: <strong id="student-id"></strong></p>
        <p>Tên sinh viên: <strong id="student-name"></strong></p>
        <p>Địa chỉ: <strong id="student-address"></strong></p>
        <p>Mã lớp: <strong id="student-class-id"></strong></p>
        <button type="button" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa sinh viên</h3>
        <p>Mã sinh viên: <input id="student-id-edit" name="student-id-edit" readonly /></p>
        <p>Tên sinh viên: <input id="student-name-edit" name="student-name-edit" /></p>
        <p>Địa chỉ: <input id="student-address-edit" name="student-address-edit" /></p>
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Sửa sinh viên</h3>
        <p>Mã sinh viên: <input id="student-id-delete" name="student-id-delete" readonly /></p>
        <p>Tên sinh viên: <input id="student-name-delete" name="student-name-delete" /></p>
        <button type="submit" class="btn" style="color: red;">Xác nhận xóa</button>
        <button type="button" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm sinh viên</h3>
        <!-- <p>Mã sinh viên: <input id="student-id-delete" name="student-id-delete" readonly /></p> -->
        <p>Tên sinh viên: <input id="student-name-add" name="student-name-add" /></p>
        <p>Địa chỉ: <input id="student-address-add" name="student-address-add" /></p>
        <p>Ngày sinh: <input type="date" id="student-birh-add" name="student-birh-add" /></p>
        <button type="submit" class="btn">Xác nhận thêm</button>
        <button type="button" onclick="closePopup()">Đóng</button>
        <p><?= $error ?></p>
    </div>
</form>

<script src="../public/assets/js/popupForm.js"></script>