<?php



require "vendor/autoload.php";

$access_token = '0xRNGvstMg2TYkFH9gcoVoJHlx+wnUgJXDAS4jCesWkVAAK4fjlv7FpL1sdBcEvUQum5C0fcFkwVBLlkSFjKveBYUiyIDB65Fovmy39TAeyUbcEPDB495n53ykDvCX+Ni+1RrnIzDq+nGAZu67BLogdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'f07da31286d040aced42f5de4c148fbd';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







