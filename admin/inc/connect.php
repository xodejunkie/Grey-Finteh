<?php
$dsn = 'mysql:host=localhost;dbname=oceans;charset=utf8';
$username = 'root';
$password = 'Xode123..';

try {
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}