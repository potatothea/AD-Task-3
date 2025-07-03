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

$schemas = [
  'user.model.sql',
  'project.model.sql',
  'project_user.model.sql',
  'tasks.model.sql',
];

foreach ($schemas as $file) {
  $path = _DIR_ . '/../database/' . $file;
  echo "📄 Applying schema from {$path}…\n";
  $sql = file_get_contents($path);
  if ($sql === false) {
    throw new RuntimeException("❌ Could not read {$path}");
  }
  $pdo->exec($sql);
  echo "✅ Successfully applied {$file}\n";
}

echo "🧹 Truncating tables…\n";
foreach (['project_users', 'tasks', 'projects', 'users'] as $table) {
  $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}
echo "✅ Tables truncated successfully.\n";

echo "🎉 All tables have been reset and recreated successfully.\n";