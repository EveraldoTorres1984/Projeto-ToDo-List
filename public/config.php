<?php

session_start();

$base = 'http://localhost';

try {
    $conn = new PDO("sqlsrv:server = sherlock.no-ip.org,7556; Database = estagio_web;", 'web_estagio', 'W3b@Estagio$#');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
