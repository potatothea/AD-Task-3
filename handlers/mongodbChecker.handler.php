<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

try {
    $mongo = new MongoDB\Driver\Manager($_ENV['MONGO_URI']);
    $mongo->executeCommand($_ENV['MONGO_DB'], new MongoDB\Driver\Command(["ping" => 1]));
    echo "✅ Connected to MongoDB successfully.  <br>";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage() . "  <br>";
}
