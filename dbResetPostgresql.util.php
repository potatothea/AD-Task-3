<?php
declare(strict_types=1);

require_once __DIR__ . '/envSetter.util.php';

try {
    // Build DSN and connect
    $dsn = "pgsql:host={$typeConfig['pg_host']};port={$typeConfig['pg_port']};dbname={$typeConfig['pg_db']}";
    $pdo = new PDO($dsn, $typeConfig['pg_user'], $typeConfig['pg_pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    echo "✅ Connected to PostgreSQL successfully\n";

    // Load schema
    echo "📄 Applying schema from database/user.model.sql…\n";
    $sqlFile = BASE_PATH . '/database/user.model.sql';
    $sql = file_get_contents($sqlFile);

    if ($sql === false) {
        throw new RuntimeException("❌ Could not read SQL file: $sqlFile");
    }

    $pdo->exec($sql);
    echo "✅ Schema applied successfully\n";

    // Truncate tables
    echo "🧹 Truncating tables…\n";
    foreach (['users'] as $table) {
        $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
    }
    echo "✅ Tables truncated\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
