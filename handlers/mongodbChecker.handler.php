<?php

$manager = new MongoDB\Driver\Manager($_ENV['MONGO_URI']);

try {
    $command = new MongoDB\Driver\Command(["ping" => 1]);
    $manager->executeCommand($_ENV['MONGO_DB'], $command);
    echo "✅ Connected to MongoDB successfully. <br>";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage() . " <br>";
}
