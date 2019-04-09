<?php require_once "function.php";

$username   = "085781838818";
$apiKey   = "4715caad53c186d4";
$signature  = md5($username.$apiKey.'pl');

$json = '{
          "commands" : "pricelist",
          "username" : "085781838818",
          "sign"     : "36ab187b6332139edf0a65078aa57552"
        }';

$url = "https://testprepaid.mobilepulsa.net/v1/legacy/index";

$ch  = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($ch);
curl_close($ch);

// print_r($data);
vardump(json_decode($data));
?>
