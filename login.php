<form method="POST" action="handlers/auth.handler.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="action" value="login">Login</button>
</form>

<?php
// Optional: display error/success messages from session
session_start();
if (isset($_SESSION['message'])) {
    echo "<p>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}
?>
