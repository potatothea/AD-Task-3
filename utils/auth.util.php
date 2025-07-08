<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth
{
    // Load static user data
    private static function getUsers()
    {
        return include(__DIR__ . '/../staticdata/user.staticdata.php');
    }

    // Check login credentials
    public static function login($username, $password)
    {
        $users = self::getUsers();

        foreach ($users as $user) {
            if ($user['username'] === $username) {
                if ($user['password'] === $password) { // plain check; you can use password_verify for hashed
                    $_SESSION['user'] = $user;
                    return ['status' => true, 'message' => 'Login successful'];
                } else {
                    return ['status' => false, 'message' => 'Incorrect password'];
                }
            }
        }

        return ['status' => false, 'message' => 'Username not found'];
    }

    // Return logged-in user
    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    // Logout
    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    // Check if user is logged in
    public static function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }
}
