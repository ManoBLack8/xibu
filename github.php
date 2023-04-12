<?php
header('Access-Control-Allow-Origin: *'); 
require 'vendor/autoload.php';
$imagens = glob("./github/" . "*.jpeg");
$json = json_encode($imagens);
echo $json;