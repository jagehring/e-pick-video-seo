<?php


    $url = "http://www.viddler.com/oembed/?url=http://www.viddler.com/v/$viddlerid&format=json&Submt=submit";
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    $evsthumburl=$decoded_json['thumbnail_url'];
    $evstitle=$decoded_json['title'];
    $evsvideurl="http://www.viddler.com/embed/$viddlerid?Submt=submit/";
?>