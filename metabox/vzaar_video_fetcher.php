<?php    
    $url = "http://vzaar.com/api/videos/$vzaarid.json";
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    $evsthumburl=$decoded_json['thumbnail_url'];
    $evstitle=$decoded_json['title'];
    $evsvideurl=$decoded_json['video_url'];
    $evslength=$decoded_json['duration'];
?>