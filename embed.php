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

/**
 * https://www.youtube.com/feeds/videos.xml?user=[username]
 * https://www.youtube.com/feeds/videos.xml?channel_id=[channelId]
 * 
 * Source Code: <link rel="alternate" type="application/rss+xml" title="RSS" href="https://www.youtube.com/feeds/videos.xml?channel_id=[channelId]">
 */

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


    //var_dump($channelUsernameMatches);
    $channelName = @$channelNameMatches[1];
    $channelId = @$channelIdMatches[1];
    $channelUsername = @str_replace('/@','',$channelUsernameMatches[1][1]);
    $videoId = @$videoIdMatches[1];

    if(!isset($videoId)) return json_encode([
        "status" => "error",
        "message" => "videoId not found",
        "data" => [
            "name" => $channelName,
            "channelId" => $channelId,
            "username" => $channelUsername,
            "videoId" => null
        ]
    ]);

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
};

//include('get.php'); // Canlı yayın linki almak için get.php dosyasını kullanıyoruz. getVideoId() fonksiyonu ile YouTube kanalının canlı yayın linkini alıyoruz.

$channelId = isset($_GET['channelId']) ? $_GET['channelId'] : null;
$username = isset($_GET['username']) ? $_GET['username'] : null;
$channelName = isset($_GET['channelName']) ? $_GET['channelName'] : null;
$autoplay = isset($_GET['autoplay']) ? $_GET['autoplay'] : 1;
$mute = isset($_GET['mute']) ? $_GET['mute'] : 1;
if(!isset($channelId) && !empty($channelId) && !is_null($channelId) && !isset($username) && !empty($username) && !is_null($username)) {
    echo 'channelId or username is not defined';
    return;
}
if(!isset($channelId) && !empty($channelId) && !is_null($channelId)){
    $videoId = json_decode(getVideoId(["channelId" => $channelId]))->data->videoId;
}else if(!isset($username) && !empty($username) && !is_null($username)){
    $videoId = json_decode(getVideoId(["username" => $username]))->data->videoId;
}else{
    echo 'channelId or username is not defined';
    return;
}
echo '<style>body{margin:0px;}</style><iframe class="" width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/'. $videoId .'?autoplay='. $autoplay .'&mute='. $mute .'" title="'. $channelName .'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
?>