<?php

   $xml = simplexml_load_file("http://blip.tv/rss/$bliptvid");
$evsthumburl=current($xml->xpath('/rss/channel/item/media:thumbnail/@url'));
foreach ($xml->channel as $video) {
        $data['title']=$video->item->title;
        $data['info']=$video->item->description;
        $data['thumbpubdate']=$video->pubDate;
    } // End foreach


$evstitle=$data['title'];
$evsdesc=$data['info'];
$evsdesc2=trim(strip_tags($evsdesc));
$evsvideurl= current($xml->xpath('/rss/channel/item/blip:embedUrl'));
$evsrating=current($xml->xpath('/rss/channel/item/blip:rating'));
$video_date_pre=$data['thumbpubdate'];
$dateObject = new DateTime($video_date_pre);
$evspubdate = date_format($dateObject , '20y-m-d');


?>