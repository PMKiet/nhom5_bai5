<?php
require __DIR__ . '../../controllers/assignmentController.php';

$assignment = assignmentByTeacherIdAction();

?>

<div>
    <div class="student-header">
        <form method="GET" action="" class="studen-search inp" style="margin-top: 2rem;">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm học phân công teo lớp học.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $assignment;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($assignment, function ($e) use ($keyword) {
                    return (strstr($e['ten_lop_hoc'], $keyword));
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
                    <th>Tên học phần</th>
                    <th>Học kỳ</th>
                    <th>Số tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ten_giao_vien'] ?></th>
                        <th><?php echo $row['ten_lop_hoc'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_ky'] ?></th>
                        <th><?php echo $row['so_tiet'] ?></th>
                    <?php } ?>
            </tbody>
        </table>
    </section>
</div>