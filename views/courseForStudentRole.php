<?php
// Include popup.php để popup có thể hoạt động trong file này
// include './views/popupForm.php';
?>

<?php
require __DIR__ . '../../controllers/courseController.php';
// $controller = geta;
$listCourse = listCourseByClassId() ?? [];
echo print_r($_SESSION['idClassByStudent']);
?>

<div>
    <div class="student-header">
        <form method="GET" action="" class="studen-search inp" style="margin-top: 2rem;">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" name="search" placeholder="Tìm học phần.">
            <button class="btn search-student">Tìm</button>
        </form>

        <?php
        $filter = $listCourse;
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            //lọc mảng 2 chiều theo từ khóa
            if (!empty($keyword)) {
                $filter = array_filter($listCourse, function ($course) use ($keyword) {
                    return (strstr($course['ten_hoc_phan'], $keyword));
                });
            }
        }
        ?>

    </div>
    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã học phấn</th>
                    <th>Tên học phần</th>
                    <th>Đơn vị học trình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filter as $row) { ?>
                    <tr>
                        <th><?php echo $row['ma_hoc_phan'] ?></th>
                        <th><?php echo $row['ten_hoc_phan'] ?></th>
                        <th><?php echo $row['don_vi_hoc_trinh'] ?></th>
                    <?php } ?>
            </tbody>
        </table>
    </section>
</div>