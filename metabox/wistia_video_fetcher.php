<?php    


    $url = "http://fast.wistia.com/oembed?url=http://home.wistia.com/medias/$wistiaid";
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    $evsthumburl=$decoded_json['thumbnail_url'];
    $evstitle=$decoded_json['title'];
    $evsvideurl="http://fast.wistia.net/embed/iframe/$wistiaid/";
    $evslength=$decoded_json['duration'];
	
?>