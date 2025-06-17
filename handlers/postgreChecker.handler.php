<?php

$pgHost = $_ENV['PG_HOST'];
$pgPort = $_ENV['PG_PORT'];
$pgDb = $_ENV['PG_DB'];
$pgUser = $_ENV['PG_USER'];
$pgPass = $_ENV['PG_PASS'];

$conn_string = "host=$pgHost port=$pgPort dbname=$pgDb user=$pgUser password=$pgPass";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo "❌ PostgreSQL connection failed: " . pg_last_error() . "<br>";
} else {
    echo "✅ PostgreSQL Connection <br>";
    pg_close($dbconn);
}
