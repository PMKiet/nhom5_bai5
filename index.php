<?php
require_once __DIR__ . '/config/base_url.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$finalPath = trim(str_replace(BASE_URL, "", $request));
require __DIR__ . '/controllers/checkLogin.php';
new checkLogin();
$content = __DIR__ . '/views/teacher.php';



switch ($finalPath) {
    case '/views/teacher':
        $content = __DIR__ . '/views/teacher.php';
        break;
    case '/views/student':
        $content = __DIR__ . '/views/student.php';
        break;
    case '/views/login':
        $content = __DIR__ . '/views/student.php';
        break;
    case '/views/class':
        $content = __DIR__ . '/views/class.php';
        break;
    case '/views/course':
        $content = __DIR__ . '/views/course.php';
        break;
    case '/views/assignment':
        $content = __DIR__ . '/views/assignment.php';
        break;
    case '/views/semester':
        $content = __DIR__ . '/views/semester.php';
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhom 5</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/main.css">
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <?php require "./views/nav.php" ?>
        </nav>

        <div class="main-content">
            <?php require $content; ?>
        </div>
    </div>
</body>

</html>