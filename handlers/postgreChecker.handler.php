<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

$conn_string = "host={$_ENV['PG_HOST']} port={$_ENV['PG_PORT']} dbname={$_ENV['PG_DB']} user={$_ENV['PG_USER']} password={$_ENV['PG_PASS']}";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo "❌ PostgreSQL connection failed: " . pg_last_error() . "  <br>";
} else {
    echo "✅ PostgreSQL Connection  <br>";
    pg_close($dbconn);
}
