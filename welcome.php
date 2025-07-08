<?php
require_once 'util/auth.util.php';

if (!Auth::isAuthenticated()) {
    header("Location: login.page.php");
    exit;
}

$user = Auth::user();
echo "<h2>Welcome, {$user['first_name']} {$user['last_name']}!</h2>";
echo "<p>Role: {$user['role']}</p>";
echo "<a href='handlers/auth.handler.php?action=logout'>Logout</a>";
?>
