<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/assignmentController.php';
require __DIR__ . '../../controllers/courseController.php';
require __DIR__ . '../../controllers/classController.php';
require __DIR__ . '../../controllers/teacherController.php';
require __DIR__ . '../../controllers/semesterController.php';
// $controller = geta;
$listAssignment = listAssignmentAction() ?? [];
$listIdAndNameClass = listIdAndNameClassAction();
$listIdAndNameCourse = listIdAndNameCourseAction();
$listIdAndNameTeacher = listIdAndNameTeacherAction();
$listIdAndNameSemester = listIdAndNameSemesterAction();
?>

<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn" onclick=' openFormAdd(
                <?php echo json_encode($listIdAndNameClass) ?>
                ,<?php echo json_encode($listIdAndNameCourse) ?>
                ,<?php echo json_encode($listIdAndNameTeacher) ?>
                ,<?php echo json_encode($listIdAndNameSemester) ?>
                )'>Thêm phân công giảng dạy</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm phân công bằng tên giáo viên.">
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
                    <th>Mã phân công</th>
                    <th>Tên giáo viên</th>
                    <th>Tên lớp học</th>
                    <th>Tên hoc phần</th>
                    <th>Tên học kỳ</th>
                    <th>Số tiết</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_phan_cong'] ?></th>
                        <th><?php echo $row['ten_giao_vien'] ?></th>
                        <th><?php echo $row['ten_lop_hoc'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_ky'] ?></th>
                        <th><?php echo $row['so_tiet'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ma_phan_cong'] ?>'
                                                        ,'<?php echo $row['ten_giao_vien'] ?>'
                                                        , '<?php echo $row['ten_lop_hoc'] ?>'
                                                        , '<?php echo $row['ten_hoc_phan'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>'
                                                        , '<?php echo $row['so_tiet'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick='openFormEdit(`<?php echo $row["ma_phan_cong"] ?>`
                                                        ,<?php echo json_encode($listIdAndNameClass) ?>
                                                        ,<?php echo json_encode($listIdAndNameCourse) ?>
                                                        ,<?php echo json_encode($listIdAndNameTeacher) ?>
                                                        ,<?php echo json_encode($listIdAndNameSemester) ?>
                                                        ,`<?php echo $row["ten_giao_vien"] ?>`
                                                        ,`<?php echo $row["ten_lop_hoc"] ?>`
                                                        ,`<?php echo $row["ten_hoc_phan"] ?>`
                                                        ,`<?php echo $row["ten_hoc_ky"] ?>`
                                                        ,`<?php echo $row["so_tiet"] ?>`
                                                        )'>
                                Sửa</span>

                            <span class=" th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_phan_cong'] ?>'
                                                        ,'<?php echo $row['ten_giao_vien'] ?>'
                                                        , '<?php echo $row['ten_lop_hoc'] ?>'
                                                        , '<?php echo $row['ten_hoc_phan'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>')">
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
        <p><span>Mã phân công:</span> <strong id="assignment-id"></strong></p>
        <p><span>Tên giáo viên:</span> <strong id="assignment-teacher"></strong></p>
        <p><span>Tên lớp học:</span> <strong id="assignment-class"></strong> </p>
        <p><span>Tên học phần:</span> <strong id="assignment-course"></strong></p>
        <p><span>Tên học kỳ:</span> <strong id="assignment-semester"></strong></p>
        <p><span>Số tiết:</span> <strong id="assignment-numberOfLession"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/assignmentController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa phân công giảng dạy</h3>
        <p>
            <span>Mã phân công:</span>
            <input id="assignment-id-edit" name="assignment-id-edit"></input>
        </p>
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
            <select id="assignment-semester-edit" name="assignment-semester-edit"></select>
        </p>
        <p>
            <span>Số tiết:</span>
            <input id="assignment-numberOfLession-edit" name="assignment-numberOfLession-edit"></input>
        </p>
        <!-- <p><span>Địa chỉ:</span> <input id="student-address-edit" name="student-address-edit" /></p> -->
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/assignmentController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa phân công giảng dạy</h3>
        <p><span>Mã phân công:</span> <input id="assignment-id-delete" name="assignment-id-delete" readonly /></p>
        <p><span>Tên giáo viên:</span><input id="assignment-teacher-delete" name="assignment-teacher-delete" readonly /></p>
        <p><span>Tên lớp học:</span><input id="assignment-class-delete" name="assignment-class-delete" readonly /></p>
        <p><span>Tên học phần:</span><input id="assignment-course-delete" name="assignment-course-delete" readonly /></p>
        <p><span>Tên học kỳ:</span><input id="assignment-semester-delete" name="assignment-semester-delete" readonly /></p>
        <p><span>Số tiết:</span><input id="assignment-teacher-delete" name="assignment-teacher-delete" readonly /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/assignmentController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm phân công giảng dạy</h3>
        <p>
            <span>Tên giáo viên:</span>
            <select id="assignment-teacher-add" name="assignment-teacher-add"></select>
        </p>
        <p>
            <span>Tên lớp:</span>
            <select id="assignment-class-add" name="assignment-class-add"> </select>
        </p>
        <p>
            <span>Tên học phần:</span>
            <select id="assignment-course-add" name="assignment-course-add"></select>
        </p>
        <p>
            <span>Tên học kỳ:</span>
            <select id="assignment-semester-add" name="assignment-semester-add"></select>
        </p>
        <!-- <p><span>Địa chỉ:</span> <input id="student-address-edit" name="student-address-edit" /></p> -->
        <button type="submit" class="btn">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormAssignment.js"></script>