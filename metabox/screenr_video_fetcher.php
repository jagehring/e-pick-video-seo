<?php


    $url = "http://www.screenr.com/api/oembed.json?url=http://www.screenr.com/$screenrid";
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    $evsthumburl=$decoded_json['thumbnail_url'];
    $evstitle=$decoded_json['title'];
    $evsdesc=$decoded_json['description'];
    $evsdesc2=trim(strip_tags($evsdesc));
    $evsvideurl="http://www.screenr.com/embed/$screenrid";

?>