<?php
include_once './env.php';

// ** Exposing the environment variables is extremely insecure. **
// ** Only using for this project to avoid using extra php libraries. **
// ** As we need to upload the images to firebase storage, we need to expose the environment variables for simplicity **
// ** All the keys will be revoked after the project is completed. **

header('Content-Type: application/json');
echo json_encode($_ENV['ENV_ARRAY']);
