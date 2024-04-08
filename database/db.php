<?php
include_once '../config/env.php';
$environment = $_ENV['ENV'];

$db_host = $environment === 'production' ? $_ENV['PROD_DB_HOST'] : $_ENV['LOCAL_DB_HOST'];
$db_user = $environment === 'production' ? $_ENV['PROD_DB_USER'] : $_ENV['LOCAL_DB_USER'];
$db_pass = $environment === 'production' ? $_ENV['PROD_DB_PASS'] : $_ENV['LOCAL_DB_PASS'];

$db_name = $environment === 'production' ? $_ENV['PROD_DB_NAME'] : $_ENV['LOCAL_DB_NAME'];

$dbc = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('Error connecting to MySQL server.');

// if (mysqli_error($dbc)) {
//     die('Error: ' . mysqli_error($dbc));
// }
