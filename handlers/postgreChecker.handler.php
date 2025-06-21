<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

// Fetch config values
$host     = $typeConfig['pg_host'] ?? 'localhost';
$port     = $typeConfig['pg_port'] ?? '5432';
$username = $typeConfig['pg_user'] ?? 'user';
$password = $typeConfig['pg_pass'] ?? 'password';
$dbname   = $typeConfig['pg_db'] ?? 'adtask3';

// Build connection string
$conn_string = "host={$host} port={$port} dbname={$dbname} user={$username} password={$password}";

// Optional: Uncomment this to debug what you're actually using
// echo "🔍 Connection string: {$conn_string}<br>";

$dbconn = pg_connect($conn_string);

// Check connection result
if (!$dbconn) {
    echo "❌ Connection Failed: " . pg_last_error() . "<br>";
    exit();
} else {
    echo "✅ PostgreSQL Connection Successful<br>";
    pg_close($dbconn);
}
