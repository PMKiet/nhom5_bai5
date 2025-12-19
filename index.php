<?php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = "/nhom5_bai5";
$finalPath = trim(str_replace($basePath, "", $request));

$content = __DIR__ . '/views/teacher.php';

switch ($finalPath) {
    case '/views/teacher':
        $content = __DIR__ . '/views/teacher.php';
        break;

    case '/views/student':
        $content = __DIR__ . '/views/student.php';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhom 5</title>
    <link rel="stylesheet" href="/nhom5_bai5/public/assets/css/main.css">
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <?php require './views/nav.php' ?>
        </nav>

        <div class="main-content">
            <?php require $content; ?>
        </div>
    </div>
</body>

</html>