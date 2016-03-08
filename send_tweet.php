<?php
  
// composerの自動loadファイルをrequire  
require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
 
// tweet情報を取得
$string = file_get_contents("to_tweet.json");
$json_data = json_decode($string,true);
 
// randomで取得
$jtotal_tweets = sizeof($json_data['tweets']);
$rand_item = rand(0, $jtotal_tweets -1);
 
$message= $json_data['tweets'][$rand_item]['message'];
$image= $json_data['tweets'][$rand_item]['image'];
 
// デベロッパー情報
$consumerKey       = 'consumer-key';
$consumerSecret    = 'consumer-secret';
$accessToken       = 'access-token';
$accessTokenSecret = 'access-token-secret';
 
// インスタンス
$oAuth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
 
 
if($image != ""){ // 画像あり
 
    $media = $oAuth->upload('media/upload', array('media' =>  $image));
    $parameters = array(
        'status' => $message,
        'media_ids' => implode(',', array($media->media_id_string)),
    );
    $result = $oAuth->post('statuses/update', $parameters);
 
}else{ // 画像あり
 
    $result = $oAuth->post("statuses/update", array("status" => $message));
 
}
 
// 結果出力
var_dump($result);
 
?>