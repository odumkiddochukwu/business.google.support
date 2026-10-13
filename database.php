<?php

$databaseUrl = getenv('DATABASE_URL');

if (!$databaseUrl) {
    die('Database configuration is missing.');
}

$db = parse_url($databaseUrl);

$host = $db['host'];
$port = $db['port'] ?? 5432;
$name = ltrim($db['path'] ?? '', '/');
$user = $db['user'] ?? '';
$password = $db['pass'] ?? '';

try {
    $pdo = new PDO(
        "pgsql:host={$host};port={$port};dbname={$name};sslmode=require",
        urldecode($user),
        urldecode($password),
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('Unable to connect to the database.');
}
