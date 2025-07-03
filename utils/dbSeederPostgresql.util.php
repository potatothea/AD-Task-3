<?php
declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootstrap.php';

if (!defined('UTILS_PATH')) {
    define('UTILS_PATH', BASE_PATH . '/utils');
}
if (!defined('DUMMIES_PATH')) {
    define('DUMMIES_PATH', BASE_PATH . '/staticData/dummies');
}

require_once UTILS_PATH . '/envSetter.util.php';


try {
    $dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
    $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "✅ Connected to PostgreSQL via PDO\n";
} catch (PDOException $e) {
    die("❌ PostgreSQL connection failed: " . $e->getMessage() . "\n");
}


$dropTables = [
    'meeting_users',
    'tasks',
    'meetings',
    'users',
];

foreach ($dropTables as $table) {
    echo "🗑️ Dropping table if exists: {$table}\n";
    $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
}
echo "✅ All tables dropped successfully.\n";


$schemas = [
    'user.model.sql',
    'meeting.model.sql',
    'meeting_user.model.sql',
    'tasks.model.sql',
];

foreach ($schemas as $file) {
    $path = "database/{$file}";
    echo "📄 Applying schema from {$path}…\n";
    $sql = file_get_contents($path);
    if ($sql === false) {
        throw new RuntimeException("❌ Could not read {$path}");
    }
    $pdo->exec($sql);
    echo "✅ Successfully applied {$file}\n";
}


$users = require_once DUMMIES_PATH . '/users.staticData.php';

echo "🌱 Seeding users…\n";

$stmt = $pdo->prepare("
    INSERT INTO users (username, first_name, last_name, password, role, email)
    VALUES (:username, :first_name, :last_name, :password, :role, :email)
");


foreach ($users as $u) {
    $stmt->execute([
        ':username'    => $u['username'],
        ':first_name'  => $u['first_name'],
        ':last_name'   => $u['last_name'],
        ':password'    => password_hash($u['password'], PASSWORD_DEFAULT),
        ':role'        => $u['role'],
        ':email'       => $u['email'],
    ]);
}

echo "✅ PostgreSQL seeding complete!\n";
