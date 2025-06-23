<?php
require_once UTILS_PATH . '/envSetter.util.php';

$host     = $typeConfig['pg_host'] ?? 'localhost';
$port     = $typeConfig['pg_port'] ?? '5432';
$username = $typeConfig['pg_user'] ?? 'user';
$password = $typeConfig['pg_pass'] ?? 'password';
$dbname   = $typeConfig['pg_db'] ?? 'adtask3';

$conn_string = "host={$host} port={$port} dbname={$dbname} user={$username} password={$password}";

$host     = $typeConfig['pg_host'];
$port     = $typeConfig['pg_port'];
$user     = $typeConfig['pg_user'];
$password = $typeConfig['pg_pass'];
$dbname   = $typeConfig['pg_db'];

$conn_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";

if (!function_exists('pg_connect')) {
    echo "❌ PostgreSQL extension for PHP is not installed or enabled.\n";
} else {
    $dbconn = pg_connect($conn_string);

    if (!$dbconn) {
        echo "❌ PostgreSQL connection failed.\n";
    } else {
        echo "✅ PostgreSQL connected successfully.\n";
        pg_close($dbconn);
    }
}
