<?php



    $xml = simplexml_load_file("http://www.veoh.com/rest/video/$veohid/details");
 
$evsthumburl=current($xml->xpath('/videos/video/@fullMedResImagePath'));
$evstitle=current($xml->xpath('/videos/video/@title'));
$evsdesc=current($xml->xpath('/videos/video/@description'));
$evsdesc2=trim(strip_tags($evsdesc));
$evsvideurl="http://www.veoh.com/static/swf/veoh/SPL.swf?permalinkId=$veohid";
$evsrating=current($xml->xpath('/videos/video/@rating'));
$video_date_pre=current($xml->xpath('/videos/video/@dateAdded'));
$dateObject = new DateTime($video_date_pre);
$evspubdate = date_format($dateObject , '20y-m-d');
$str_time=current($xml->xpath('/videos/video/@length'));
sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
$evslength = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes

?>