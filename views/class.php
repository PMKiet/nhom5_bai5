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
            <button class="btn" onclick="openFormAdd()">Thêm lớp</button>
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
                    // return ($class['ten_lop_hoc'] == $keyword);
                    return (stristr($class['ten_lop_hoc'], $keyword));
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

                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_lop_hoc'] ?>'
                                                        ,'<?php echo $row['ten_lop_hoc'] ?>')">
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
<form method="POST" action="../controllers/classController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa Lớp học</h3>
        <p><span>Mã lớp học:</span> <input id="class-id-delete" name="class-id-delete" readonly /></p>
        <p><span>Tên lớp học:</span><input id="class-name-delete" name="class-name-delete" /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/classController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm lớp</h3>

        <p><span>Tên lớp:</span> <input class="input-form" id="class-name-add" name="class-name-add" require /></p>
        <p><span>Hệ đào đạo:</span> <input class="input-form" id="class-training-add" name="class-training-add" require /></p>

        <button type="submit" class="btn add-class">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormClass.js"></script>