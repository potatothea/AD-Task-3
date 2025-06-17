<?php

define('BASE_PATH', realpath(__DIR__ . '/../'));
require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();
