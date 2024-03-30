<?php
include_once './env.php';

header('Content-Type: application/json');
echo json_encode(getenv('ENV_ARRAY'));
