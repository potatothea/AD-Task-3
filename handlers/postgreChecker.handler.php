<?php
$pgHost = $_ENV["PG_HOST"] ?? '';
$pgPort = $_ENV["PG_PORT"] ?? '';
$pgDb   = $_ENV["PG_DB"] ?? '';
$pgUser = $_ENV["PG_USER"] ?? '';
$pgPass = $_ENV["PG_PASS"] ?? '';

$connStr = "host=$pgHost port=$pgPort dbname=$pgDb user=$pgUser password=$pgPass";
$pgConn = pg_connect($connStr);

if ($pgConn) {
    echo "✅ PostgreSQL Connection Successful<br>";
} else {
    echo "❌ Connection Failed:<br>" . pg_last_error();
}
