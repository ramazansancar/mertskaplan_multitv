<?php

function getVideoId($channelInfo){
  $channelInfo['channelId'] = isset($channelInfo['channelId']) ? $channelInfo['channelId'] : null;
  $channelInfo['username'] = isset($channelInfo['username']) ? $channelInfo['username'] : null;

  if(!isset($channelInfo['channelId']) && !empty($channelInfo['channelId']) && !is_null($channelInfo['channelId']) && !isset($channelInfo['username']) && !empty($channelInfo['username']) && !is_null($channelInfo['username'])) {
    return json_encode([
      "status" => "error",
      "message" => "channelId or username is not defined",
      "data" => [
        "channelId" => null,
        "username" => null,
        "videoId" => null
      ]
    ]);
  }

  if(!empty($channelInfo['channelId'])){
    $url = 'https://www.youtube.com/channel/'.$channelInfo['channelId'].'/live';
  }else if(!empty($channelInfo['username'])){
    $url = 'https://www.youtube.com/@'.$channelInfo['username'].'/live';
  }else{
    return json_encode([
      "status" => "error",
      "message" => "channelId or username is not defined",
      "data" => [
        "channelId" => null,
        "username" => null,
        "videoId" => null
      ]
    ]);
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
  $html = curl_exec($ch);
  curl_close($ch);

  preg_match('/\"videoId\":\"(.+?)\"/', $html, $videoIdMatches);
  preg_match('/\"channelName\":\"(.+?)\"/', $html, $channelNameMatches);
  preg_match_all('/\"canonicalBaseUrl\":\"(.+?)\"/', $html, $channelUsernameMatches);
  preg_match('/\"channelId\":\"(.+?)\"/', $html, $channelIdMatches);

  $channelName = @$channelNameMatches[1];
  $channelId = @$channelIdMatches[1];
  $channelUsername = @str_replace('/@','',$channelUsernameMatches[1][1]);
  $videoId = @$videoIdMatches[1];

  if(!isset($videoId)){
    return json_encode([
      "status" => "error",
      "message" => "videoId not found",
      "data" => [
        "name" => $channelName,
        "channelId" => $channelId,
        "username" => $channelUsername,
        "videoId" => null
      ]
    ]);
  }

  return json_encode([
    "status" => "success",
    "message" => "videoId found",
    "data" => [
      "name" => $channelName,
      "channelId" => $channelId,
      "username" => $channelUsername,
      "videoId" => $videoId
    ]
  ]);
}

if($_GET){
  if(isset($_GET['channel']) && !empty($_GET['channel']) && !is_null($_GET['channel'])){
    return;
  }
  // GET Request Security
  if(isset($_GET)){
    foreach($_GET as $key => $value){
      $_GET[$key] = htmlspecialchars($value);
      $_GET[$key] = strip_tags($value);
      $_GET[$key] = trim($value);
      $_GET[$key] = stripslashes($value);
      $_GET[$key] = str_replace("'", "", $value);
      $_GET[$key] = str_replace('"', "", $value);
      $_GET[$key] = str_replace('`', "", $value);
      $_GET[$key] = str_replace(';', "", $value);
      $_GET[$key] = str_replace('=', "", $value);
      $_GET[$key] = str_replace('(', "", $value);
      $_GET[$key] = str_replace(')', "", $value);
      $_GET[$key] = str_replace('!', "", $value);
      $_GET[$key] = str_replace('?', "", $value);
      $_GET[$key] = str_replace('*', "", $value);
      $_GET[$key] = str_replace('&', "", $value);
      $_GET[$key] = str_replace('%', "", $value);
      $_GET[$key] = str_replace('$', "", $value);
      $_GET[$key] = str_replace('#', "", $value);
      $_GET[$key] = str_replace('@', "", $value);
      $_GET[$key] = str_replace('|', "", $value);
      $_GET[$key] = str_replace('\\', "", $value);
      $_GET[$key] = str_replace('/', "", $value);
      $_GET[$key] = str_replace('<', "", $value);
      $_GET[$key] = str_replace('>', "", $value);
      $_GET[$key] = str_replace(',', "", $value);
      $_GET[$key] = str_replace(':', "", $value);
    }
  }

  if(isset($_GET['channelId']) && !empty($_GET['channelId']) && !is_null($_GET['channelId'])){
    echo getVideoId(["channelId" => $_GET['channelId']]);
  }else if(isset($_GET['username']) && !empty($_GET['username']) && !is_null($_GET['username'])){
    echo getVideoId(["username" => $_GET['username']]);
  }else if(isset($_GET['channelId']) && !empty($_GET['channelId']) && !is_null($_GET['channelId']) && isset($_GET['username']) && !empty($_GET['username']) && !is_null($_GET['username'])){
    echo getVideoId(["channelId" => $_GET['channelId'], "username" => $_GET['username']]);
  }else{
    echo json_encode([
      "status" => "error",
      "message" => "channelId or username is not defined",
      "data" => [
        "name" => null,
        "channelId" => null,
        "username" => null,
        "videoId" => null
      ]
    ]);
  }
}

?>