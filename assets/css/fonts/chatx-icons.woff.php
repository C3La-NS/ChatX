<?php
// Horrible piece of shit 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-font-woff");
echo @file_get_contents("chatx-icons.woff");
?>