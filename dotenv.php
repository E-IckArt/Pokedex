<?php

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

echo '<pre>';
// var_dump($_SERVER);
var_dump($_ENV);
