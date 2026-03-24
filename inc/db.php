<?php
$pghost = getenv('PGHOST') ?: 'localhost';
$pgport = getenv('PGPORT') ?: '5432';
$pguser = getenv('PGUSER') ?: 'postgres';
$pgpassword = getenv('PGPASSWORD') ?: '';
$pgdatabase = getenv('PGDATABASE') ?: 'postgres';

try {
    $dsn = "pgsql:host=$pghost;port=$pgport;dbname=$pgdatabase";
    $conn = new PDO($dsn, $pguser, $pgpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
