<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/planController.php';
require __DIR__ . '../../controllers/courseController.php';
require __DIR__ . '../../controllers/classController.php';
require __DIR__ . '../../controllers/teacherController.php';
require __DIR__ . '../../controllers/semesterController.php';
// $controller = geta;
$listAllPlan = listPlanAction() ?? [];
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
                ,<?php echo json_encode($listIdAndNameSemester) ?>
                )'>Thêm kế hoạch</button>
        </div>
        <form method="GET" action="" class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm kế hoạch bằng tên.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listAllPlan;
        $keyword = "";
        if (isset($_GET['search'])) {

            $keyword = $_GET['search'];

            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listAllPlan, function ($assignment) use ($keyword) {

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
                    <th>Tên kế hoạch</th>
                    <th>Tên lớp học</th>
                    <th>Tên hoc phần</th>
                    <th>Tên học kỳ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ten_ke_hoach'] ?></th>
                        <th><?php echo $row['ten_lop_hoc'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_ky'] ?></th>
                        <th>
                            <span class="th-icon th-icon-view"
                                onclick="openForm('<?php echo $row['ten_ke_hoach'] ?>' 
                                                        , '<?php echo $row['ten_lop_hoc'] ?>'
                                                        , '<?php echo $row['ten_hoc_phan'] ?>'
                                                        , '<?php echo $row['ten_hoc_ky'] ?>')">
                                Xem</span>

                            <span class="th-icon th-icon-edit"
                                onclick='openFormEdit(`<?php echo $row["ma_ke_hoach"] ?>`
                                                        ,`<?php echo $row["ten_ke_hoach"] ?>`
                                                        ,<?php echo json_encode($listIdAndNameClass) ?>
                                                        ,<?php echo json_encode($listIdAndNameCourse) ?>
                                                        ,<?php echo json_encode($listIdAndNameSemester) ?> 
                                                        ,`<?php echo $row["ten_lop_hoc"] ?>`
                                                        ,`<?php echo $row["ten_hoc_phan"] ?>`
                                                        ,`<?php echo $row["ten_hoc_ky"] ?>` 
                                                        )'>
                                Sửa</span>

                            <span class=" th-icon th-icon-delete"
                                onclick="openFormDelete('<?php echo $row['ma_ke_hoach'] ?>' 
                                                        , '<?php echo $row['ten_ke_hoach'] ?>'
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
        <h3>Xem kế hoạch</h3>
        <p><span>Tên kế hoạch:</span> <strong id="plan-id"></strong></p>
        <p><span>Tên lớp học:</span> <strong id="plan-class"></strong> </p>
        <p><span>Tên học phần:</span> <strong id="plan-course"></strong></p>
        <p><span>Tên học kỳ:</span> <strong id="plan-semester"></strong></p>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</div>

<!-- form sua sinh vieen -->
<form method="POST" action="../controllers/planController.php" id="popupForm-edit" class="modal">
    <input id="type" type="hidden" name="action" value="update">
    <div class="modal-content">
        <h3>Sửa phân công giảng dạy</h3>
        <p>
            <span>Mã kế hoạch:</span>
            <input id="plan-id-edit" name="plan-id-edit"></input>
        </p>
        <p>
            <span>Tên kế hoạch:</span>
            <input id="plan-name-edit" name="plan-name-edit"></input>
        </p>
        <p>
            <span>Tên lớp:</span>
            <select id="plan-class-edit" name="plan-class-edit"> </select>
        </p>
        <p>
            <span>Tên học phần:</span>
            <select id="plan-course-edit" name="plan-course-edit"></select>
        </p>
        <p>
            <span>Tên học kỳ:</span>
            <select id="plan-semester-edit" name="plan-semester-edit"></select>
        </p>
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" class="btn close" onclick="closePopupEdit()">Đóng</button>
    </div>
</form>

<!-- form xoa sinh vieen -->
<form method="POST" action="../controllers/planController.php" id="popupForm-delete" class="modal">
    <input type="hidden" name="action" value="delete">
    <div class="modal-content">
        <h3>Xóa kế hoạch</h3>
        <p><span>Mã kế hoạch:</span> <input id="plan-id-delete" name="plan-id-delete" readonly /></p>
        <p><span>Tên kế hoạch:</span><input id="plan-name-delete" name="plan-name-delete" readonly /></p>
        <p><span>Tên lớp học:</span><input id="plan-class-delete" name="plan-class-delete" readonly /></p>
        <p><span>Tên học phần:</span><input id="plan-course-delete" name="plan-course-delete" readonly /></p>
        <p><span>Tên học kỳ:</span><input id="plan-semester-delete" name="plan-semester-delete" readonly /></p>
        <button type="submit" class="btn" style="background-color: red;">Xác nhận xóa</button>
        <button type="button" class="btn close" style="background-color: var(--bg-btn);" onclick="closePopup()">Đóng</button>
    </div>
</form>

<!-- form theem sinh vieen -->
<form method="POST" action="../controllers/planController.php" id="popupForm-add" class="modal">
    <input type="hidden" name="action" value="add">
    <div class="modal-content">
        <h3>Thêm kế hoạch</h3>
        <p>
            <span>Tên kế hoạch:</span>
            <input id="plan-name-add" name="plan-name-add"></input>
        </p>
        <p>
            <span>Tên lớp:</span>
            <select id="plan-class-add" name="plan-class-add">
                <option value="chon" class="n-opt-class" selected>Chọn Lớp</option>
            </select>
        </p>
        <p>
            <span>Tên học phần:</span>
            <select id="plan-course-add" name="plan-course-add">
                <option value="chon" class="n-opt-course" selected>Chọn học phần</option>
            </select>
        </p>
        <p>
            <span>Tên học kỳ:</span>
            <select id="plan-semester-add" name="plan-semester-add">
                <option value="chon" class="n-opt-semester">Chọn giáo viên</option>

            </select>
        </p>

        <button type="submit" class="btn add-plan">Xác nhận thêm</button>
        <button type="button" class="btn close" onclick="closePopup()">Đóng</button>
    </div>
</form>

<script src="../public/assets/js/popupFormPlan.js"></script>