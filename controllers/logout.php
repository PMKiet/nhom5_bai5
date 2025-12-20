<?php
session_start();

require __DIR__ . '../../config/base_url.php';

unset($_SESSION['username']);
header('location: ' . BASE_URL . '/views/login');
