<?php require_once "function.php";

$username   = "085781838818";
$apiKey   = "4715caad53c186d4";
$ref_id  = uniqid('');
$code = 'xld25000';
$signature  = md5($username.$apiKey.$ref_id);

$json = '{
          "commands"    : "topup",
          "username"    : "085781838818",
          "ref_id"      : "'.$ref_id.'",
          "hp"          : "081777721115",
          "pulsa_code"  : "'.$code.'",
          "sign"        : "'.md5($username.$apiKey.$ref_id).'"
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
