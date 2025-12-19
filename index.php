<?php 
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $basePath = "/nhom5_bai5";
    $finalPath = trim(str_replace($basePath, "", $request));

    switch($finalPath) {
        case '/views/teacher': { 
            require __DIR__ . '/views/teacher.php';
            break;
        }
        case '/views/student': {
            require __DIR__ . '/views/student.php';
            break;
        }
        default:
            echo "default";
    }
?>