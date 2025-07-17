<?php
require_once _DIR_ . '/../bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (Auth::login($username, $password)) {
        header("Location: /pages/dashboard.php");
        exit;
    } else {
        header("Location: /index.php?error=Invalid username or password");
        exit;
    }
} else {
    header("Location: /index.php");
    exit;
}