<?php
$access_token = '0xRNGvstMg2TYkFH9gcoVoJHlx+wnUgJXDAS4jCesWkVAAK4fjlv7FpL1sdBcEvUQum5C0fcFkwVBLlkSFjKveBYUiyIDB65Fovmy39TAeyUbcEPDB495n53ykDvCX+Ni+1RrnIzDq+nGAZu67BLogdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
