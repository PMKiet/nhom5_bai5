<?php
session_start();

class checkLogin
{
    function __construct()
    {
        if (!isset($_SESSION['username'])) {
            require __DIR__ . '../../views/loginPage.php';
            exit();
        }
    }
}
