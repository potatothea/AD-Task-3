<?php
include_once __DIR__ . '/envSetter.util.php';

try {
    $mongo = new MongoDB\Driver\Manager($mongoUri);
    $command = new MongoDB\Driver\Command(["ping" => 1]);
    $mongo->executeCommand($mongoDb, $command);

    echo "✅ Connected to MongoDB successfully.<br>";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage();
}
