<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/teacherController.php';
// $controller = geta;
$listTeacher = listTeacherAction();
?>

<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn" onclick="openFormAdd()">Thêm giáo viên</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm sinh viên bằng tên.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listTeacher;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listTeacher, function ($student) use ($keyword) {
                    return (stristr($student['ten_giao_vien'], $keyword));
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã giáo viên</th>
                    <th>Tên giáo viên</th>
                    <th>Học hàm</th>
                    <th>Học vị</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_giao_vien'] ?></th>
                        <th><?php echo $row['ten_giao_vien'] ?></th>
                        <th><?php echo $row['hoc_ham'] ?></th>
                        <th><?php echo $row['hoc_vi'] ?></th>
                        <th>

                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_giao_vien'] ?>'
                                                        , '<?php echo $row['ten_giao_vien'] ?>'
                                                        , '<?php echo $row['hoc_ham'] ?>'
                                                        , '<?php echo $row['hoc_vi'] ?>')">
                                Xem</span>
                            <span class="th-icon th-icon-edit"
                                onclick='openFormEdit("<?php echo $row["ma_giao_vien"] ?>"
                                                        ,"<?php echo $row["ten_giao_vien"] ?>"
                                                        , "<?php echo $row["hoc_ham"] ?>" 
                                                        , "<?php echo $row["hoc_vi"] ?>" )'>
                                Sửa</span>
                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_giao_vien'] ?>'
                                                        ,'<?php echo $row['ten_giao_vien'] ?>')">
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
        <h3>Xem giáo viên</h3>
        <p><span>Mã giáo viên:</span> <strong id="teacher-id"></strong></p>
        <p><span>Tên giáo viên:</span> <strong id="teacher-name"></strong> </p>
        <p><span>Học hàm:</span> <strong id="teacher-rank"></strong></p>
        <p><span>Học vị:</span><strong id="teacher-degree"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/teacherController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa giáo viên</h3>
        <p><span>Mã giáo viên:</span><input id="teacher-id-edit" name="teacher-id-edit" readonly /></p>
        <p><span>Tên giáo viên:</span><input id="teacher-name-edit" name="teacher-name-edit" /></p>
        <p><span>Học hàm:</span> <input id="teacher-rank-edit" name="teacher-rank-edit" /></p>
        <p><span>Học vị:</span> <input id="teacher-degree-edit" name="teacher-degree-edit" /></p>

        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/teacherController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa giáo viên</h3>
        <p><span>Mã giáo viên:</span> <input id="teacher-id-delete" name="teacher-id-delete" readonly /></p>
        <p><span>Tên giáo viên:</span><input id="teacher-name-delete" name="teacher-name-delete" readonly /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/teacherController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm giáo viên</h3>

        <p><span>Tên giáo viên:</span> <input class="input-form" id="teacher-name-add" name="teacher-name-add" require /></p>
        <p><span>Học hàm:</span> <input class="input-form" id="teacher-rank-add" name="teacher-rank-add" require /></p>
        <!-- <p><span>Học vị:</span> <input class="input-form" type="date" id="teacher-birh-add" name="teacher-birh-add" require /></p> -->
        <p>
            <span>Học vị:</span>
            <select class="input-form" type="date" id="teacher-degree-add" name="teacher-degree-add">
                <option value="Kỹ sữ">Kỹ sư</option>
                <option value="Bác sĩ">Bác sĩ</option>
                <option value="Dược sĩ">Dược sĩ</option>
                <option value="Thạc sĩ">Thạc sĩ</option>
                <option value="Tiến sĩ">Tiến sĩ</option>
            </select>
        </p>

        <button type="submit" class="btn add-teacher">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormTeacher.js"></script>