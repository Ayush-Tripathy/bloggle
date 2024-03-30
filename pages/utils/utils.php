<?php
function import_css($path)
{
    echo "<style>";
    include_once $path;
    echo "</style>";
}

function import_js($path)
{
    echo "<script>";
    include_once $path;
    echo "</script>";
}

$colorMap = [
    'A' => '964B00',
    'B' => '2D9596',
    'C' => '8CB9BD',
    'D' => 'F72798',
    'E' => 'ECB159',
    'F' => '9F70FD',
    'G' => '40A2E3',
    'H' => '0D9276',
    'I' => 'FF6868',
    'J' => '9DBC98',
    'K' => '365486',
    'L' => '6DA4AA',
    'M' => '525CEB',
    'N' => '4B0082',
    'O' => 'EE82EE',
    'P' => '00FF00',
    'Q' => '808000',
    'R' => 'FFA500',
    'S' => '9BCF53',
    'T' => '800000',
    'U' => 'C0C0C0',
    'V' => 'FFD700',
    'W' => '964B00',
    'X' => '964B00',
    'Y' => 'FFFF00',
    'Z' => '008000'
];

function get_user_default_image_url($username)
{
    global $colorMap;
    $firstLetter = strtoupper($username[0]);
    $color = $colorMap[$firstLetter];
    return "https://ui-avatars.com/api/?name=$username&background=$color&color=fff";
}
