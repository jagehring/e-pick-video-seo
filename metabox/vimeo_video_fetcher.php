<?php


 $data['video_type'] = 'vimeo';
    $data['video_id'] = $vimeoid;
    $xml = simplexml_load_file("http://vimeo.com/api/v2/video/$vimeoid.xml");
        
    foreach ($xml->video as $video) {
        $data['id']=$video->id;
        $data['title']=$video->title;
        $data['info']=$video->description;
        $data['url']=$video->url;
        $data['thumb_medium']=$video->thumbnail_medium;
        $data['duration']=$video->duration;
        $data['thumbpubdate']=$video->upload_date;
    } // End foreach
$evsthumburl=$data['thumb_medium'];
$evstitle=$data['title'];
$evsdesc=$data['info'];
$evsdesc2=trim(strip_tags($evsdesc));
$evsvideurl="http://vimeo.com/moogaloop.swf?clip_id=$vimeoid";
$evslength=$data['duration'];
$video_date_pre=$data['thumbpubdate'];
$dateObject = new DateTime($video_date_pre);
$evspubdate = date_format($dateObject , '20y-m-d');

?>