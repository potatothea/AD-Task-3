<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', ''); 
}

require_once 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable('.');
$dotenv->load();


if (!file_exists('.env')) {
    die("❌ .env file not found at: .env");
}


$requiredKeys = ['PG_HOST', 'PG_PORT', 'PG_DB', 'PG_USER', 'PG_PASS', 'MONGO_URI', 'MONGO_DB'];
foreach ($requiredKeys as $key) {
    if (!isset($_ENV[$key])) {
        die("❌ Missing ENV key: $key");
    }
}


if (php_sapi_name() === 'cli') {
    $_ENV['PG_HOST'] = 'localhost'; 
}

$typeConfig = [
    'env_name'   => $_ENV['ENV_adtask3'] ?? 'local',

    'pg_host'    => $_ENV['PG_HOST'],
    'pg_port'    => $_ENV['PG_PORT'],
    'pg_db'      => $_ENV['PG_DB'],
    'pg_user'    => $_ENV['PG_USER'],
    'pg_pass'    => $_ENV['PG_PASS'],

    'mongo_uri'  => $_ENV['MONGO_URI'],
    'mongo_db'   => $_ENV['MONGO_DB'],
];

$pgConfig = [
    'host' => $typeConfig['pg_host'],
    'port' => $typeConfig['pg_port'],
    'db'   => $typeConfig['pg_db'],
    'user' => $typeConfig['pg_user'],
    'pass' => $typeConfig['pg_pass'],
];
