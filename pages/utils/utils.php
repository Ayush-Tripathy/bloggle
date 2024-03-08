<?php
function import_css($path)
{
    echo "<style>";
    include_once $path;
    echo "</style>";
}
