<?php
$evstitle=get_the_title();
$evspreviewdescription = $post->post_content;
$string = trim(strip_tags($evspreviewdescription));
$newString = substr($string, 0, 450);
$evsdesc3=trim(preg_replace('/\s+&/',' ', $newString));
$evsrating='';
$evsfileloc=$selfvidurl;
$evsvideurl=$selfvidurl;
$evslength='';
$video_date_pre=get_the_time('Y-m-d', $post->ID);
$dateObject = new DateTime($video_date_pre);
$evspubdate = date_format($dateObject , '20y-m-d');
?>