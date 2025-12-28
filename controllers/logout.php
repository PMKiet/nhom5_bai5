<?php
session_start();

require __DIR__ . '../../config/base_url.php';

unset($_SESSION['role']);
unset($_SESSION['username']);
unset($_SESSION['idUser']);
unset($_SESSION['idClassByStudent']);
header('location: ' . BASE_URL . '/views/login');
