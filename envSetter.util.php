<?php

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$typeConfig = [
    'key' => $_ENV['ENV_NAME'],
];
