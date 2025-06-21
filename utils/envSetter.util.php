<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}
require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$envPath = BASE_PATH . '/.env';
if (!file_exists($envPath)) {
    die("❌ .env file not found at: $envPath");
}

$typeConfig = [
    'env_name'   => $_ENV['ENV_adtask3'] ?? 'local',

    'pg_host'    => $_ENV['PG_HOST'] ?? 'localhost',
    'pg_port'    => $_ENV['PG_PORT'] ?? '5432',
    'pg_db'      => $_ENV['PG_DB'] ?? '',
    'pg_user'    => $_ENV['PG_USER'] ?? '',
    'pg_pass'    => $_ENV['PG_PASS'] ?? '',

    'mongo_uri'  => $_ENV['MONGO_URI'] ?? '',
    'mongo_db'   => $_ENV['MONGO_DB'] ?? '',
];
