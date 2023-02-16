<?php
require 'vendor/autoload.php';
$hoje  = date('Ymd');
$data_start = date('Ymd', strtotime('-5 days', strtotime($hoje)));

$imagens = glob("./ifmtcuiabaoficial/" . "*.jpg");

$retorno = [];
foreach($imagens as $img){
    $dataarq = preg_replace("/[^0-9]/","", $img);
    
    $dataarq = substr($dataarq, 0, 8);
    if(intval($dataarq) >= intval($data_start)){
        array_push($retorno,$img);
    }
}
$json = json_encode($retorno);
echo $json;