<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$accessToken = '0xRNGvstMg2TYkFH9gcoVoJHlx+wnUgJXDAS4jCesWkVAAK4fjlv7FpL1sdBcEvUQum5C0fcFkwVBLlkSFjKveBYUiyIDB65Fovmy39TAeyUbcEPDB495n53ykDvCX+Ni+1RrnIzDq+nGAZu67BLogdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$accessToken}";

//รับข้อความจากผู้ใช้
$message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
if($message == "สวัสดี"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
    replyMsg($arrayHeader,$arrayPostData);
}
#ตัวอย่าง Message Type "Sticker"
else if($message == "ฝันดี"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "sticker";
    $arrayPostData['messages'][0]['packageId'] = "2";
    $arrayPostData['messages'][0]['stickerId'] = "46";
    replyMsg($arrayHeader,$arrayPostData);
}
#ตัวอย่าง Message Type "Image"
else if($message == "รูปน้องแมว"){
    $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "image";
    $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
    $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
    replyMsg($arrayHeader,$arrayPostData);
}
#ตัวอย่าง Message Type "Location"
else if($message == "พิกัดสยามพารากอน"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "location";
    $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
    $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
    $arrayPostData['messages'][0]['latitude'] = "13.7465354";
    $arrayPostData['messages'][0]['longitude'] = "100.532752";
    replyMsg($arrayHeader,$arrayPostData);
}
#ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
else if($message == "ลาก่อน"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
    $arrayPostData['messages'][1]['type'] = "sticker";
    $arrayPostData['messages'][1]['packageId'] = "1";
    $arrayPostData['messages'][1]['stickerId'] = "131";
    replyMsg($arrayHeader,$arrayPostData);
}

else if($message == "เบลล่า"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "น่ากลัว";
    $arrayPostData['messages'][1]['type'] = "sticker";
    $arrayPostData['messages'][1]['packageId'] = "2";
    $arrayPostData['messages'][1]['stickerId'] = "152";
    replyMsg($arrayHeader,$arrayPostData);
}

else if($message == "เฟรมมี่"){
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "น่ารักฝุดๆ";
    $arrayPostData['messages'][1]['type'] = "sticker";
    $arrayPostData['messages'][1]['packageId'] = "1";
    $arrayPostData['messages'][1]['stickerId'] = "2";
    replyMsg($arrayHeader,$arrayPostData);
}

else if($message == "Test"){
  $arrayPostData = '{
"replyToken": "'.$arrayJson['events'][0]['replyToken'].'",
  "type": "template",
  "altText": "this is a carousel template",
  "template": {
    "type": "carousel",
    "actions": [],
    "columns": [
      {
        "thumbnailImageUrl": "https://qz.com/wp-content/uploads/2017/01/apple-airpods-review-very-useful.jpg?quality=80&strip=all&w=3500",
        "title": "Airpods",
        "text": "฿6,900",
        "actions": [
          {
            "type": "postback",
            "label": "Buy",
            "text": "Buy",
            "data": "id=1&action=buy"
          },
          {
            "type": "postback",
            "label": "Add to Bag",
            "text": "Add to Bag",
            "data": "id=1&action=bag"
          }
        ]
      },
      {
        "thumbnailImageUrl": "http://mikient.com/image/cache/catalog/beats-x-2-500x500.jpg",
        "title": "BeatsX",
        "text": "฿5,900",
        "actions": [
          {
            "type": "postback",
            "label": "Buy",
            "text": "Buy",
            "data": "id=2&action=buy"
          },
          {
            "type": "postback",
            "label": "Add to Bag",
            "text": "Add to Bag",
            "data": "id=2&action=bag"
          }
        ]
      }
    ]
  }
}';
     replyMsg($arrayHeader,$arrayPostData);
$arrayPostData = json_decode($arrayPostData,true);
}

function replyMsg($arrayHeader,$arrayPostData){
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
    echo $result . "\r\n";
}
echo "OK";
exit;
