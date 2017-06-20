 <?php

    $url = 'https://api.dailymotion.com/video/'.$dailymotionid.'?fields=title,description,duration,rating,thumbnail_120_url,embed_url,id,created_time';
    $json = file_get_contents($url);
    $decoded_json = json_decode($json, true);
    $evsthumburl=$decoded_json['thumbnail_120_url'];
    $evstitle=$decoded_json['title'];
    $evsdesc=$decoded_json['description'];
    $evsdesc2=trim(strip_tags($evsdesc));
    $evsrating=$decoded_json['rating'];
    $evsvideurl=$decoded_json['embed_url'];
    $evslength=$decoded_json['duration'];
    $realdmdate=$decoded_json['created_time'];
    $video_date_pre=date('Y/m/d H:i:s', $realdmdate);
	$dateObject = new DateTime($video_date_pre);
    $evspubdate = date_format($dateObject , '20y-m-d');

?>