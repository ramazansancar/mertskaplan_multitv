<?php
/*
    Name: Multi TV - Embed
    Version: 1.0.0
    Author: Ramazan Sancar, ramazan@ramazansancar.com.tr
    Licence: MIT Licence - https://github.com/ramazansancar/mertskaplan_multitv/blob/main/LICENSE
    Source: https://github.com/ramazansancar/mertskaplan_multitv
*/

/**
 * https://www.youtube.com/feeds/videos.xml?user=[username]
 * https://www.youtube.com/feeds/videos.xml?channel_id=[channelId]
 * 
 * Source Code: <link rel="alternate" type="application/rss+xml" title="RSS" href="https://www.youtube.com/feeds/videos.xml?channel_id=[channelId]">
 */

/*
    Name: Multi TV - Get Stream Video ID
    Version: 1.0.0
    Author: Ramazan Sancar, ramazan@ramazansancar.com.tr
    Licence: MIT Licence - https://github.com/ramazansancar/mertskaplan_multitv/blob/main/LICENSE
    Source: https://github.com/ramazansancar/mertskaplan_multitv
*/

// https://www.youtube.com/embed/live_stream?channel=UCuUyxpMsyXUgXqRsI9-F5eQ

$channelId = isset($_GET['channelId']) ? $_GET['channelId'] : null;
$username = isset($_GET['username']) ? $_GET['username'] : null;
$channelName = isset($_GET['channelName']) ? $_GET['channelName'] : null;
$autoplay = isset($_GET['autoplay']) ? $_GET['autoplay'] : 1;
$mute = isset($_GET['mute']) ? $_GET['mute'] : 1;
if(!isset($channelId) && !empty($channelId) && !is_null($channelId) && !isset($username) && !empty($username) && !is_null($username)) {
  echo 'channelId or username is not defined';
  return;
}
include_once 'get.php';
if(!empty($channelId)){
  //$url = 'https://www.youtube-nocookie.com/embed/live_stream?channel='.$channelId;
  $details = getVideoId(["channelId" => $channelId]);
  $videoId = $details['data']['videoId'];
  if($channelName == null){
    $channelName = $details['data']['name'];
  }
  if($videoId == null){
    $url = 'https://www.youtube-nocookie.com/embed/live_stream?channel='.$channelId.'&autoplay='. $autoplay .'&mute='. $mute;
  } else {
    $url = 'https://www.youtube-nocookie.com/embed/'.getVideoId(["channelId" => $channelId])['data']['videoId'].'?autoplay='. $autoplay .'&mute='. $mute;
  }
} elseif (!empty($username)) {
  $details = getVideoId(["username" => $username]);
  $videoId = $details['data']['videoId'];
  if($channelName == null){
    $channelName = $details['data']['name'];
  }
  if($videoId == null){
    $url = 'https://www.youtube-nocookie.com/@'.$username.'/live';
  } else {
    $url = 'https://www.youtube-nocookie.com/embed/'.getVideoId(["username" => $username])['data']['videoId'].'?autoplay='. $autoplay .'&mute='. $mute;
  }
} else {
  echo 'channelId or username is not defined';
  return;
}

echo '<style>
  body { margin: 0px; }
  .channel-name {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
  }
</style>
<div class="channel-name">' . htmlspecialchars($channelName) . '</div>
<iframe class="" width="100%" height="100%" src="'. $url .'" title="'. $channelName .'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

?>
