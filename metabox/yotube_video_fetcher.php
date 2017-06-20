<?php

    $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$youtubeid&key=$api";
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    foreach ($decoded_json['items'] as $items) {
         $title= $items['snippet']['title'];
         $description = $items['snippet']['description'];
         $thumb = $items['snippet']['thumbnails']['default']['url'];
         $published = $items['snippet']['publishedAt'];
    }


    $evsthumburl=$thumb;
    $evstitle = $title;
    $evsdesc=$description;
    $evsdesc2=trim(strip_tags($evsdesc));
    if (isset($decoded_json['data']['rating'])) {
	$evsrating=$decoded_json['data']['rating'];
	}
    $evsvideurl="https://www.youtube-nocookie.com/v/$youtubeid";
    $evslength=$decoded_json['data']['duration'];
    $video_date_pre=$published;
	$dateObject = new DateTime($video_date_pre);
    $evspubdate = date_format($dateObject , '20y-m-d');






?>
