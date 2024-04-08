<?php
$envFile = __DIR__ . '/../.env';

if (!file_exists($envFile)) {
    exit('.env file not found');
}

$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$env = [];
foreach ($lines as $line) {
    list($key, $value) = explode('=', $line, 2);
    $key = trim($key);
    $value = trim($value);
    $_ENV[$key] = $value;
    $env[$key] = $value;
}
$_ENV['ENV_ARRAY'] = json_encode($env);
