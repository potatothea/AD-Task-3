<?php
session_start();

// Demo users (replace with DB queries if needed)
$users = [
  'althea' => ['password' => '12345678', 'role' => 'Admin'],
  'john'   => ['password' => 'password123', 'role' => 'User']
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($users[$username]) && $users[$username]['password'] === $password) {
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $users[$username]['role'];
  header("Location: dashboard.php");
  exit;
} else {
  echo "<script>alert('Invalid credentials'); window.location.href='index.html';</script>";
}
?>
