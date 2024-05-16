<?php
try {
    $cn = new PDO("mysql:host=localhost;dbname=pascal_store", 'root', '1234', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ]);
} catch (Throwable $exception) {
    exit('Error DB Connection ...');
}