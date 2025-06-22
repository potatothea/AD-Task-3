<?php
declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootstrap.php';
require_once __DIR__ . '/envSetter.util.php';

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL via PDO\n";

$dropTables = [
  'project_users',
  'tasks',
  'projects',
  'users',
];

foreach ($dropTables as $table) {
  echo "🗑️ Dropping table if exists: {$table}\n";
  $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
}

echo "✅ All dependent tables dropped successfully.\n";

$schemas = [
  'user.model.sql',
  'project.model.sql',
  'project_user.model.sql',
  'tasks.model.sql',
];

foreach ($schemas as $file) {
  $path = __DIR__ . '/../database/' . $file;
  echo "📄 Applying schema from {$path}…\n";
  $sql = file_get_contents($path);
  if ($sql === false) {
    throw new RuntimeException("❌ Could not read {$path}");
  }
  $pdo->exec($sql);
  echo "✅ Successfully applied {$file}\n";
}

echo "🎉 Database reset and schemas recreated successfully.\n";
