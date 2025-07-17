<?php
require_once __DIR__ . '/../util/db.php';
session_start();

class Auth
{
    public static function login($username, $password)
    {
        $conn = DB::connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            return [
                'status' => true,
                'message' => 'Login successful!',
                'redirect' => '../dashboard.php'
            ];
        }

        return [
            'status' => false,
            'message' => 'Invalid username or password.'
        ];
    }

    public static function check()
    {
        return isset($_SESSION['user_id']);
    }

    public static function user()
    {
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'username' => $_SESSION['username'] ?? null,
            'role' => $_SESSION['role'] ?? null,
        ];
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ../login.php");
        exit;
    }
}
