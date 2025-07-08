<?php
require_once '../util/auth.util.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = Auth::login($username, $password);

    $_SESSION['message'] = $result['message'];

    if ($result['status']) {
        header('Location: ../welcome.page.php');
    } else {
        header('Location: ../login.page.php');
    }
    exit;
}

// Handle logout via GET
if ($_GET['action'] === 'logout') {
    Auth::logout();
    header('Location: ../login.page.php');
    exit;
}
