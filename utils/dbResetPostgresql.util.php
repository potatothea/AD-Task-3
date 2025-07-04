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

echo "✅ All dependent tables dropped successfully.\n";

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


echo "🎉 Database reset and schemas recreated successfully.\n";
