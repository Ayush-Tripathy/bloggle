<?php
include_once '../config/env.php';

$environment = getenv('ENV');
$db_host = $environment === 'production' ? getenv('PROD_DB_HOST') : getenv('LOCAL_DB_HOST');
$db_user = $environment === 'production' ? getenv('PROD_DB_USER') : getenv('LOCAL_DB_USER');
$db_pass = $environment === 'production' ? getenv('PROD_DB_PASS') : getenv('LOCAL_DB_PASS');

$db_name = $environment === 'production' ? getenv('PROD_DB_NAME') : getenv('LOCAL_DB_NAME');

$dbc = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('Error connecting to MySQL server.');

// if (mysqli_error($dbc)) {
//     die('Error: ' . mysqli_error($dbc));
// }
