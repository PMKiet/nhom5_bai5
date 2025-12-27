<?php
require_once __DIR__ . '/config/base_url.php';
require __DIR__ . '/controllers/checkLogin.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$finalPath = trim(str_replace(BASE_URL, "", $request));
new checkLogin();
$content = __DIR__ . '/views/teacher.php';
$role = $_SESSION['role'];

switch ($finalPath) {
    case '/views/teacher':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/teacher.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
        break;
    case '/views/student':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/student.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
        break;
    case '/views/class':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/class.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
        break;
    case '/views/course':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/course.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
        break;
    case '/views/assignment':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/assignment.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
        break;
    case '/views/semester':
        if ($role === 'admin') {
            $content = __DIR__ . '/views/semester.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }

        break;
    case '/views/studentprofile':
        if ($role === 'student') {
            $content = __DIR__ . '/views/studentProfile.php';
        } else {
            require __DIR__ . '/views/loginPage.php';
            exit();
        }
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