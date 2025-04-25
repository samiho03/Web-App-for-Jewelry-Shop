<?php

$amount = 2300;
$merchant_id ="1226337";
$order_id = "uniqid";
$currency = "LKR"; 
$merchant_secret ="ODQzNzQxNTQ4MzUwNDk1NDIwMzIyNTM1MzIxMzE0MDk0NTcxNjEz";


$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);

$array = [];


$array['amount'] = $amount;
$array['merchant_id'] = $merchant_id;
$array['order_id'] = $order_id;
$array['amount'] = $amount;
$array['currency '] = $currency ;
$array['hash'] = $hash;

$jsonOb = json_encode($array);
echo $jsonOb;

?>