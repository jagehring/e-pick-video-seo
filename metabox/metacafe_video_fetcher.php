<?php



    $xml = simplexml_load_file("http://www.metacafe.com/api/item/$metacafeid/");  
    foreach ($xml->channel as $video) {
        $data['title']=$video->item->title;
        $data['info']=$video->item->description;
        $data['rating']=$video->item->rank;
    } // End foreach

$evstitle=$data['title'];
$evsdesc=$data['info'];
$evsdesc2=trim(strip_tags($evsdesc));
$evsrating=$data['rating'];
$evsvideurl=current($xml->xpath('/rss/channel/item/media:content/@url'));
$evslength=current($xml->xpath('/rss/channel/item/media:content/@duration'));
$evstitle2 = str_replace(' ', '_', $evstitle);
$evsthumburl=current($xml->xpath('/rss/channel/item/media:thumbnail/@url'));
$video_date_pre=$video->item->pubDate;
$dateObject = new DateTime($video_date_pre);
$evspubdate = date_format($dateObject , '20y-m-d');
?>