<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/assignmentController.php';
require __DIR__ . '../../controllers/courseController.php';
require __DIR__ . '../../controllers/classController.php';
// $controller = geta;
$listAssignment = listAssignmentAction();
$listIdAndNameClass = listIdAndNameClassAction();
$listIdAndNameCourse = listIdAndNameCourseAction();
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
        $filter = $listAssignment;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listAssignment, function ($assignment) use ($keyword) {
                    return (stristr($assignment['ten_giao_vien'], $keyword));
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Tên giáo viên</th>
                    <th>Tên lớp học</th>
                    <th>Tên hoc phần</th>
                    <th>Tên học kỳ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ten_giao_vien'] ?></th>
                        <th><?php echo $row['ten_lop_hoc'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_ky'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ten_giao_vien'] ?>'
                                                        , '<?php echo $row['ten_lop_hoc'] ?>'
                                                        , '<?php echo $row['ten_hoc_phan'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick='openFormEdit(<?php echo json_encode($listIdAndNameClass) ?>
                                                        ,<?php echo json_encode($listIdAndNameCourse) ?>)'>
                                Sửa</span>

                            <span class="th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ten_giao_vien'] ?>'
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
        <h3>Xem phân công giảng dạy</h3>
        <p><span>Tên giáo viên:</span> <strong id="assignment-teacher"></strong></p>
        <p><span>Tên lớp học:</span> <strong id="assignment-class"></strong> </p>
        <p><span>Tên học phần:</span> <strong id="assignment-course"></strong></p>
        <p><span>Tên học kỳ:</span> <strong id="assignment-semester"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/courseController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa phân công giảng dạy</h3>
        <p>
            <span>Tên giáo viên:</span>
            <select id="assignment-teacher-edit" name="assignment-teacher-edit"></select>
        </p>
        <p>
            <span>Tên lớp:</span>
            <select id="assignment-class-edit" name="assignment-class-edit"> </select>
        </p>
        <p>
            <span>Tên học phần:</span>
            <select id="assignment-course-edit" name="assignment-course-edit"></select>
        </p>
        <p>
            <span>Tên học kỳ:</span>
            <select id="assignment-course-edit" name="assignment-course-edit"></select>
        </p>
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
        <p><span>Đơn vị học trình:</span> <input class="input-form" id="course-unit-add" name="course-unit-add" require /></p>

        <button type="submit" class="btn add-course">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormAssignment.js"></script>