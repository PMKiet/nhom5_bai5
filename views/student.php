<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/StudentController.php';
require __DIR__ . '../../controllers/classController.php';
// $controller = geta;
$listStudent = listUserAction();
$listIdAndNameClass = listIdAndNameClassAction();
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
                    return (strstr($student['ten_sinh_vien'], $keyword));
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
                        <th><?php
                            if ($row['f_ma_lop_hoc'] != "") {
                                echo $row['f_ma_lop_hoc'];
                            } else {
                                echo 'Không có';
                            }
                            ?></th>
                        <th><?php echo $row['dia_chi'] ?></th>
                        <th>

                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_sinh_vien'] ?>'
                                                        , '<?php echo $row['ten_sinh_vien'] ?>'
                                                        , '<?php echo $row['f_ma_lop_hoc'] ?>'
                                                        , '<?php echo $row['dia_chi'] ?>')">
                                Xem</span>
                            <span class="th-icon th-icon-edit"
                                onclick='openFormEdit("<?php echo $row["ma_sinh_vien"] ?>"
                                                        ,"<?php echo $row["ten_sinh_vien"] ?>"
                                                        , "<?php echo $row["dia_chi"] ?>"
                                                        , <?php echo json_encode($listIdAndNameClass) ?>)'>
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
    <div>
        <!-- <?php echo print_r($listClass) ?> -->
    </div>
</div>

<!-- form xem sinh vieen -->
<div id="popupForm-view" class="modal">
    <div class="modal-content">
        <h3>Xem sinh viên</h3>
        <p><span>Mã sinh viên:</span> <strong id="student-id"></strong></p>
        <p><span>Tên sinh viên:</span>
            <strong id="student-name"></strong>
        </p>
        <p><span>Địa chỉ:</span> <strong id="student-address"></strong></p>
        <p><span>Mã lớp:</span><strong id="student-class-id"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa sinh viên</h3>
        <p><span>Mã sinh viên:</span><input id="student-id-edit" name="student-id-edit" readonly /></p>
        <p><span>Tên sinh viên:</span><input id="student-name-edit" name="student-name-edit" /></p>
        <p><span>Địa chỉ:</span> <input id="student-address-edit" name="student-address-edit" /></p>
        <p><span>Lớp:</span>
            <select name="student-idClass-edit" id="student-idClass-edit">
            </select>
        </p>
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa sinh viên</h3>
        <p><span>Mã sinh viên:</span> <input id="student-id-delete" name="student-id-delete" readonly /></p>
        <p><span>Tên sinh viên:</span><input id="student-name-delete" name="student-name-delete" readonly /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/StudentController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm sinh viên</h3>
        <!-- <p>Mã sinh viên: <input id="student-id-delete" name="student-id-delete" readonly /></p> -->
        <p><span>Tên sinh viên:</span> <input class="input-form" id="student-name-add" name="student-name-add" require /></p>
        <p><span>Địa chỉ:</span> <input class="input-form" id="student-address-add" name="student-address-add" require /></p>
        <p><span>Ngày sinh:</span> <input class="input-form" type="date" id="student-birh-add" name="student-birh-add" require /></p>

        <button type="submit" class="btn add-student">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormStudent.js"></script>