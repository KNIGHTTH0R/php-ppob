<?php require_once "function.php";

$username   = "085781838818";
$apiKey   = "4715caad53c186d4";
$ref_id  = uniqid('');
$signature  = md5($username.$apiKey.$ref_id);
$code  = 'BPJS';
$hp  = '8801234560001';
$month  = 2;

$json = '{
          "commands" : "inq-pasca",
          "username" : "'.$username.'",
          "code"     : "'.$code.'",
          "ref_id"   : "'.$ref_id.'",
          "hp"       : "'.$hp.'",
          "sign"     : "'.md5($username.$apiKey.$ref_id).'",
          "month"    : "'.$month.'"
      }';

$url = "https://testpostpaid.mobilepulsa.net/api/v1/bill/check";

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
