<?php
include_once __DIR__ . '/envSetter.util.php';

try {
    $pgConn = pg_connect("host=$pgHost port=$pgPort dbname=$pgDb user=$pgUser password=$pgPass");

    if ($pgConn) {
        echo "✅ PostgreSQL Connected successfully.<br>";
    } else {
        echo "❌ Connection Failed:<br>";
        echo pg_last_error();
    }
} catch (Exception $e) {
    echo "❌ PostgreSQL connection failed: " . $e->getMessage();
}
