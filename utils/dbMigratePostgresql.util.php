<?php
declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootstrap.php';

if (!defined('UTILS_PATH')) {
    define('UTILS_PATH', BASE_PATH . '/utils');
}

require_once UTILS_PATH . '/envSetter.util.php';

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL via PDO\n";

echo "🗑️ Dropping old tables…\n";
foreach ([
  'projects',
  'meeting_users',
  'tasks',
  'meetings',
  'users',
] as $table) {
  $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
  echo "🗑️ Dropped {$table}\n";
}

echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/user.model.sql');
if ($sql === false) {
    throw new RuntimeException("❌ Could not read database/user.model.sql");
}
$pdo->exec($sql);
echo "✅ Creation Success from the database/user.model.sql\n";

$schemas = [
  'meeting.model.sql',
  'meeting_user.model.sql',
  'tasks.model.sql',
  
];

foreach ($schemas as $file) {
    echo "Applying schema from database/{$file}…\n";
    $sql = file_get_contents("database/{$file}");
    if ($sql === false) {
        throw new RuntimeException("❌ Could not read database/{$file}");
    }
    $pdo->exec($sql);
    echo "✅ Creation Success from the database/{$file}\n";
}

echo "🎉 Database migration complete!\n";
