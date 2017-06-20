<?php

function evs_video_seo_metabox() {
	$options = get_option('evs_settings');
	global $post;
	global $evs_options;

	$evstitle='';
	$evstitle2='';
	$evsthumburl='';
	$evsdesc2='';
	$evsdesc3='';
	$evsrating='';
	$evsvideurl='';
	$evslength='';
	$familycheckedstatus='';
	$evsauthor='';
	$thumbauthorname='';
	$evspubdate='';
	$evsfileloc='';
  $api=$options['api'];

	$thumbloc = get_post_meta( $post->ID, 'thumbloc', true );
	$thumbtitle = get_post_meta( $post->ID, 'thumbtitle', true );
	$thumbdesc = get_post_meta( $post->ID, 'thumbdesc', true );
	$thumbdate = get_post_meta( $post->ID, 'thumbdate', true );
	$thumbplayer = get_post_meta( $post->ID, 'thumbplayer', true );
	$thumbfileloc = get_post_meta( $post->ID, 'thumbfileloc', true );
	$thumbduration = get_post_meta( $post->ID, 'thumbduration', true );
	$thumbauthor = get_post_meta( $post->ID, 'thumbauthor', true );
	$thumbauthorname = get_post_meta( $post->ID, 'thumbauthorname', true );
	$thumbpubdate = get_post_meta( $post->ID, 'thumbpubdate', true );
	$family = get_post_meta( $post->ID, 'family', true );
	$evsdisable = get_post_meta( $post->ID, 'evsdisable', true );


   global $post;
   $userid=$post->post_author;
   $authorurl=get_the_author_meta( 'user_login', $userid );
   $evsauthorname1=get_the_author_meta( 'user_firstname', $userid );
   $evsauthorname2=get_the_author_meta( 'user_lastname', $userid );
   $evsauthorname= "$evsauthorname1 $evsauthorname2";
   $evsauthor=''.home_url().'/author/'.$authorurl.'';
   $post_id=get_the_ID();
   $evscustomfields=get_post_meta($post_id);
   $evsjson = json_encode($evscustomfields);
   $evsStringArray = str_replace(array("[","]","\\"), array("","",""), $evsjson);
   $excerpt =get_the_excerpt();
   $postcontent=$post->post_content;
   $finalcontent=$postcontent . $excerpt;



if (preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/e', $postcontent , $youtubematch4))  {;
$youtubeid = $youtubematch4[2];
}

if (preg_match('/youtu\.be\/([\w\-]+)/e', $postcontent , $youtubematch5))  {;
$youtubeid = $youtubematch5[1];
}

if (preg_match('/\/\/www\.youtube\.com\/embed\/([\w\-]+)/e', $postcontent , $youtubematch6))  {;
$youtubeid = $youtubematch6[1];

}


if (preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/e', $finalcontent , $youtubematch1))  {;
$youtubeid = $youtubematch1[2];


}

if  (preg_match('/youtu\.be\/([\w\-]+)/e', $finalcontent , $youtubematch2) )  {;
$youtubeid = $youtubematch2[1];

}

if  (preg_match('/\/\/www\.youtube\.com\/embed\/([\w\-]+)/e', $finalcontent , $youtubematch3) )  {;
$youtubeid = $youtubematch3[1];

}





if((preg_match('/((http:\/\/)?(www\.)?metacafe\.com)(\/watch\/)(\d+)(.*)/i', $finalcontent , $metacafematch1)) ) {;
 $metacafeid=$metacafematch1[5];

}

if((preg_match('/((http:\/\/)?(www\.)?metacafe\.com)(\/embed\/)(\d+)(.*)/i', $finalcontent , $metacafematch2)) ) {;
 $metacafeid=$metacafematch2[5];

}

if (preg_match('/http:\/\/www\.metacafe\.com\/watch\/(.*?)\/(.*?)\//', $evsStringArray , $metacafematch3))  {;
$metacafeid = $metacafematch3[1];

}



if((preg_match('/http:\/\/www\.dailymotion\.com\/video\/([^_]+)/', $finalcontent , $dailymotionmatch)) ) {;
 $dailymotionid=$dailymotionmatch[1];
}

if((preg_match('/http:\/\/www\.dailymotion\.com\/video\/([^_]+)/', $evsStringArray , $dailymotionmatch1)) ) {;
 $dailymotionid=$dailymotionmatch1[1];
}
if((preg_match('#http://www.dailymotion.com/embed/video/([A-Za-z0-9]+)#s', $finalcontent , $dailymotionmatch2)) ) {;
 $dailymotionid=$dailymotionmatch2[1];

}
if((preg_match('#http://www.dailymotion.com/embed/video/([A-Za-z0-9]+)#s', $evsStringArray , $dailymotionmatch3)) ) {;
 $dailymotionid=$dailymotionmatch3[1];
}


if((preg_match('/http:\/\/www\.veoh\.com\/watch\/([\w\-]+)/', $finalcontent , $veohmatch1)) ) {;
 $veohid=$veohmatch1[1];

}

if((preg_match('/http:\/\/www\.veoh\.com\/videos\/([\w\-]+)/', $finalcontent , $veohmatch2)) ) {;
 $veohid=$veohmatch2[1];

}

if((preg_match('/http:\/\/www\.veoh\.com\/watch\/([\w\-]+)/', $evsStringArray , $veohmatch3)) ) {;
 $veohid=$veohmatch3[1];

}

if((preg_match('/http:\/\/www\.veoh\.com\/videos\/([\w\-]+)/', $evsStringArray , $veohmatch4)) ) {;
 $veohid=$veohmatch4[1];

}

if((preg_match('/http:\/\/www\.screenr\.com\/([\w\-]+)/', $finalcontent , $screenrmatch1)) ) {;
 $screenrid=$screenrmatch1[1];
}

if((preg_match('/http:\/\/www\.screenr\.com\/embed\/([\w\-]+)/', $finalcontent , $screenrmatch2)) ) {;
 $screenrid=$screenrmatch2[1];
}

if((preg_match('/http:\/\/www\.screenr\.com\/([\w\-]+)/', $evsStringArray , $screenrmatch3)) ) {;
 $screenrid=$screenrmatch3[1];
}

if((preg_match('/http:\/\/www\.screenr\.com\/embed\/([\w\-]+)/', $evsStringArray , $screenrmatch4)) ) {;
 $screenrid=$screenrmatch4[1];
}

if((preg_match('/http:\/\/([\w\-]+)\.wistia\.com\/medias\/([\w\-]+)/', $finalcontent , $wistiamatch1)) ) {;
 $wistiaid=$wistiamatch1[2];

}

if((preg_match('/http:\/\/fast\.wistia\.com\/embed\/iframe\/([\w\-]+)/', $finalcontent , $wistiamatch2)) ) {;
 $wistiaid=$wistiamatch2[1];
}

if((preg_match('/fast\.wistia\.net\/embed\/iframe\/([\w\-]+)/', $finalcontent , $wistiamatch3)) ) {;
 $wistiaid=$wistiamatch3[1];
}

if((preg_match('/http:\/\/([\w\-]+)\.wistia\.com\/medias\/([\w\-]+)/', $evsStringArray , $wistiamatch4)) ) {;
 $wistiaid=$wistiamatch4[2];

}


if((preg_match('/http:\/\/vzaar\.com\/videos\/([\w\-]+)/', $finalcontent , $vzaarmatch1)) ) {;
 $vzaarid=$vzaarmatch1[1];
}

if((preg_match('/http:\/\/view\.vzaar\.com\/([\w\-]+)\/video/', $finalcontent , $vzaarmatch2)) ) {;
 $vzaarid=$vzaarmatch2[1];
}

 if((preg_match('/http:\/\/view\.vzaar\.com\/([\w\-]+)\/player/', $finalcontent , $vzaarmatch3)) ) {;
 $vzaarid=$vzaarmatch3[1];
}

if((preg_match('/http:\/\/vzaar\.com\/videos\/([\w\-]+)/', $evsStringArray , $vzaarmatch4)) ) {;
 $vzaarid=$vzaarmatch4[1];
}

if((preg_match('/http:\/\/view\.vzaar\.com\/([\w\-]+)\/video/', $evsStringArray , $vzaarmatch5)) ) {;
 $vzaarid=$vzaarmatch5[1];
}

 if((preg_match('/http:\/\/view\.vzaar\.com\/([\w\-]+)\/player/', $evsStringArray , $vzaarmatch6)) ) {;
 $vzaarid=$vzaarmatch6[1];
}


 if((preg_match('/http:\/\/www\.viddler\.com\/v\/([\w\-]+)/', $finalcontent , $viddlermatch1)) ) {;
 $viddlerid=$viddlermatch1[1];

}

 if((preg_match('/http:\/\/www\.viddler\.com\/embed\/([\w\-]+)/', $finalcontent , $viddlermatch2)) ) {;
 $viddlerid=$viddlermatch2[1];

}

 if((preg_match('/http:\/\/www\.viddler\.com\/v\/([\w\-]+)/', $evsStringArray , $viddlermatch3)) ) {;
 $viddlerid=$viddlermatch3[1];

}

 if((preg_match('/http:\/\/www\.viddler\.com\/embed\/([\w\-]+)/', $evsStringArray , $viddlermatch4)) ) {;
 $viddlerid=$viddlermatch4[1];

}

 if((preg_match('/http:\/\/(.*?)blip\.tv\/[A-Za-z0-9\-\_]+\/[a-z0-9\-\_]+\-([\w\-]+)/', $finalcontent , $bliptvmatch)) ) {;
 $bliptvid=$bliptvmatch[2];
}

 if((preg_match('/http:\/\/(.*?)blip\.tv\/[A-Za-z0-9\-\_]+\/[a-z0-9\-\_]+\-([\w\-]+)/', $evsStringArray , $bliptvmatch2)) ) {;
 $bliptvid=$bliptvmatch2[2];
}


$vimeomatchcode='~
            # Match Vimeo link and embed code
            (?:<iframe [^>]*src=")?       # If iframe match up to first quote of src
            (?:                         # Group vimeo url
                https?:\/\/             # Either http or https
                (?:[\w]+\.)*            # Optional subdomains
                vimeo\.com              # Match vimeo.com
                (?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
                \/                      # Slash before Id
                ([0-9]+)                # $1: VIDEO_ID is numeric
                [^\s]*                  # Not a space
            )                           # End group
            "?                          # Match end quote if part of src
            (?:[^>]*></iframe>)?        # Match the end of the iframe
            (?:<p>.*</p>)?              # Match any title information stuff
            ~ix';

if (preg_match('/\/player\.vimeo\.com\/video\/([\w\-]+)/', $post->post_content, $vimeomatch))
{
$vimeoid = $vimeomatch[1];
}

if (preg_match('/\/player\.vimeo\.com\/video\/([\w\-]+)/', $evsStringArray, $vimeomatch1))
{
$vimeoid = $vimeomatch1[1];
}

if (preg_match($vimeomatchcode, $post->post_content, $vimeomatch3))

{
$vimeoid = $vimeomatch3[1];
}

if (preg_match($vimeomatchcode, $evsStringArray, $vimeomatch4))
{
$vimeoid = $vimeomatch4[1];
}

if (preg_match('!http://.+\.(?:mp?4|avi|flv|wmv|mov|mpg|m4p|mkv|3GPP|ogv|MPEGPS|wmv|3gp|WebM|divx|rm|mpe|mpeg|mpeg2|mpeg4|DAT)!Ui', $post->post_content, $selfmatches)) {
$selfvidurl=$selfmatches[0];
}elseif (preg_match('!http://.+\.(?:mp?4|avi|flv|wmv|mov|mpg|m4p|mkv|3GPP|ogv|MPEGPS|wmv|3gp|WebM|divx|rm|mpe|mpeg|mpeg2|mpeg4|DAT)!Ui', $evsStringArray, $selfmatches1)) {
$selfvidurl=$selfmatches1[0];
}





function evs_is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}




if (($youtubematch1) || ($youtubematch2) || ($youtubematch3) || ($youtubematch4) || ($youtubematch5) || ($youtubematch6)) {
?><div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Youtube video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('yotube_video_fetcher.php');
}elseif (($metacafematch1) ||($metacafematch2) ||($metacafematch3)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Metacafe video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('metacafe_video_fetcher.php');
}elseif (($dailymotionmatch) || ($dailymotionmatch1) || ($dailymotionmatch2) || ($dailymotionmatch3)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Dailymotion video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('dailymotion_video_fetcher.php');
}elseif (($vimeomatch) || ($vimeomatch1) || ($vimeomatch3) || ($vimeomatch4)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Vimeo video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('vimeo_video_fetcher.php');
}elseif (($veohmatch1) || ($veohmatch2) || ($veohmatch3) || ($veohmatch4)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Veoh video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('veoh_video_fetcher.php');
}elseif (($screenrmatch1) || ($screenrmatch2) || ($screenrmatch3) || ($screenrmatch4) ) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Screenr video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
<?php
include ('screenr_video_fetcher.php');
}elseif (($wistiamatch1) || ($wistiamatch2) || ($wistiamatch3) || ($wistiamatch4) ) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Wistia video has been found from your post content.Wistia api does not provide description and rating.</b></font>
</div> <?php
include ('wistia_video_fetcher.php');
}elseif (($vzaarmatch1) || ($vzaarmatch2) || ($vzaarmatch3) || ($vzaarmatch4) || ($vzaarmatch5) || ($vzaarmatch6)) {?>
	<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Vzaar video has been found from your post content.Vzaar api does not provide description and rating.</b></font>
</div> <?php
include ('vzaar_video_fetcher.php');
}elseif (($viddlermatch1) || ($viddlermatch2) || ($viddlermatch3) || ($viddlermatch4) ) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Viddler video has been found from your post content.Viddler api does not provide description and rating.</b></font>
</div>
<?php
include ('viddler_video_fetcher.php');
} elseif (($bliptvmatch) || ($bliptvmatch2)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>blip.tv video has been found from your post content.Search engine preview may be slight different from snippet preview.</b></font>
</div>
 <?php
include ('bliptv_video_fetcher.php');
} elseif (($selfmatches) || ($selfmatches1)) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Self hosted video <a href="<?php echo $selfvidurl; ?>"><?php echo $selfvidurl; ?></a> has been found in your post content.</b></font>
</div> <?php
if (!$thumbloc) { ?>
<br />
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Please upload your thumb by clicking on upload thumb button below.</b></font>
</div>
<?php
}
include ('self_video_fetcher.php');
} elseif (evs_is_edit_page('new')) { ?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Please Update your post once to grab video seo information. </b></font>
</div>	<?php
}elseif (evs_is_edit_page('edit')) {
if ($thumbloc) {?>
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Current snippet preview reflects the inputs you entered below. No video has been found in your content. if you have changed video into content, Clear all fields and update post .</b></font>
</div><br />
<?php }?>


<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55;  border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>No video found in your content. <a href="http://phppoet.com/supported-services-by-e-pick-video-seo-plugin/">Click here</a> to view supported video provider for this plugin.If you are using other video provider service then please enter each video seo field manually. </b></font>
</div>
<?php
}



if ($thumbloc) {
$thumbcontents = @file_get_contents($thumbloc);

if (!strlen($thumbcontents))
{?>
<br />
<div id="videonotice" style="background-color:#ffffe0; border-color: #e6db55; border-width: 1px; border-style: solid; width :auto; height:auto;">
	<font color="black" size="02"><b>Your entered thumbnail Url does not exist.Please enter a valid thumbnail url.</b></font>
</div>
<?php }
}


if ($family) {$familycheckedstatus='checked';} else {$familycheckedstatus='unchecked';}
if ($evsdisable) {$evsdisablecheckedstatus='checked';} else {$evsdisablecheckedstatus='unchecked';}


include ('evs-snippet-preview.php');
include ('evs-script-loader.php');
	 ?>

	<table class="widefat"><tr><td><label class="checkbox" for="evsdisable" ><font size="02"> <?php echo __('Disable video seo for this post  ','evsseo'); ?></font>:</td>
               <td><input type="checkbox" name="evsdisable" id="evsdisable" value="yes" <?php echo $evsdisablecheckedstatus; ?> />
         </label> </td> </tr>
		  </table>  <br />
<div id="evsvideobox" <?php if ($evsdisable) {echo 'style=display:none';}?>>



	<table class="widefat">
	<form id= "myform" action="" method="POST">
	<tr><td><label for="thumbloc"><font size="02"><?php echo __('Video thumbnail url  (*required) ','evsseo'); ?> </font> :</td>
	<td><input id="thumbloc" class="evs_thumbloc" name="thumbloc" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbloc) {echo $thumbloc;} else {echo $evsthumburl;} ?>"  ><input id="evs_upload_button" type="button" value="upload thumb" class="evs-upload_image_button button-secondary" /> </input></label></p></td>
	</tr><tr><td><label for="thumbtitle"><font size="02"> <?php echo __('video seo  Title (*required) ','evsseo'); ?>    </font>:  </td>
		</td><td><input  id="thumbtitle" name="thumbtitle" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbtitle) {echo $thumbtitle;} else {echo $evstitle2;} ?>"  ></input></label></p></td>

	</tr><tr><td><p><label for="thumbdesc"><font size="02"><?php echo __('Video Description (*required) (Maximum 2048 characters) ','evsseo'); ?> </font>:<br /></td>
	</td><td><textarea class="thumbdesc" id="thumbdesc" name="thumbdesc"  font size="2" rows="03" cols="58" value=""  ><?php if ($evsdisable) {echo '';} elseif ($thumbdesc) { echo $thumbdesc;} else {echo $evsdesc3;} ?></textarea></label></p><br /></td>

	</tr><tr><td><label for="thumbdate"><font size="02"> <?php echo __('Video  Transcript (optional)','evsseo'); ?>   </font>:  </td>
		</td><td><input id="thumbdate" name="thumbdate" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbdate) {echo $thumbdate;}else {echo $evsrating;} ?>"  ></input></label></p></td>

	</tr><?php
		if (($selfmatches) && !(($youtubematch1) || ($youtubematch2) || ($youtubematch3) || ($metacafematch1) ||($metacafematch2) || ($dailymotionmatch) || ($vimeomatch) || ($veohmatch1) || ($veohmatch2) || ($screenrmatch1) || ($screenrmatch2) || ($wistiamatch1) || ($wistiamatch2) || ($wistiamatch3) || ($vzaarmatch1) || ($vzaarmatch2) || ($vzaarmatch3) || ($viddlermatch1) || ($viddlermatch2)))
		{ ?>

		<tr>	<td><label for="thumbfileloc"><font size="02"><?php echo __('Video File Location (*required)  ','evsseo'); ?></font>:  </td>
		<td><input id="thumbfileloc" name="thumbfileloc" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbfileloc) {echo $thumbfileloc;} else {echo $evsfileloc;} ?>"  ></input></label></p></td>

	</tr> <?php } ?>
		<tr>	<td><label for="thumbplayer"><font size="02"><?php echo __('Videp player url (*required) ','evsseo'); ?></font>:  </td>
		<td><input id="thumbplayer" name="thumbplayer" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbplayer) {echo $thumbplayer;} else {echo $evsvideurl;} ?>"  ></input></label></p></td>

	</tr>
	<tr><td>	<label for="thumbduration"><font size="02"> <?php echo __('Video duration (In Seconds) (recommended) ','evsseo'); ?> </font>:  </td>
		</td><td><input id="thumbduration" name="thumbduration" size="60"  value="<?php if ($evsdisable) {echo '';} elseif ($thumbduration) {echo $thumbduration;} else {echo $evslength;} ?>"  ></input></label></p></td>
	<tr>

	<td><label class="checkbox" for="family" ><font size="02"> <?php echo __('Check if your video is not family friendly  ','evsseo'); ?></font>:</td>
                <td><input type="checkbox" name="family" id="family" value="yes" <?php if ($evsdisable) {echo '';} else {echo $familycheckedstatus; } ?> />
         </label></td>
		</tr>

	<input type="hidden" name="thumbauthor" id="thumbauthor" value="<?php if ($evsdisable) {echo '';} elseif ($thumbauthor) {echo $thumbauthor;} elseif ($evsauthor !='') {echo $evsauthor;} ?>" />
	<input type="hidden" name="thumbauthorname" id="thumbauthorname" value="<?php if ($evsdisable) {echo '';} elseif ($thumbauthorname) {echo $thumbauthorname;} elseif ($evsauthorname !='') {echo $evsauthorname;} ?>" />
	<input type="hidden" name="thumbpubdate" id="thumbpubdate" value="<?php if ($evsdisable) {echo '';} elseif ($thumbpubdate) {echo $thumbpubdate;} elseif ($evspubdate !='') {echo $evspubdate;} ?>" />
	</table>
<br />

<div id="evsvideobuttons">
   <table class="widefat"><tr>

   <td><input id="update_video_fields" type="button" value="update all fields" class="button-primary" style="float:left;" /><img  src="<?php echo evs_PLUGIN_URL; ?>/images/ajax-loader.gif"  class="waiting" id="evsloading" style="display:none; float:left;">
   </td>
    <td><input id="add_to_sitemap" type="button" value="Add to sitemap" class="button-primary" style="float:left;" /><img  src="<?php echo evs_PLUGIN_URL; ?>/images/ajax-loader.gif"  class="waiting" id="evsloading2" style="display:none; float:left;">
   </td>
   <td><input id="clear_video_button" type="button" value="clear all fields" class="button-primary" /> </td>
   <td><input id="reupdate_video_button" type="button" value="regenerate all fields" class="button-primary" /> </td>
   </tr>

   </form></table>
   <br />
   <div id="evsupdatestatus" style="display:none; background-color:#ffffe0; border-color: #e6db55;  border-width: 1px; border-style: solid; width :auto; height:auto;">
   </div> <br />
   <div id="evsupdatestatus2" style="display:none; background-color:#ffffe0; border-color: #e6db55;  border-width: 1px; border-style: solid; width :auto; height:auto;">
   </div>
   </div><br/>





</div>

<?php
 }
/**
 * Process the custom metabox fields
 */









function evssave_custom_url10( $post_id ) {


	update_post_meta( $post_id, 'evsdisable', ( isset($_POST['evsdisable']) && $_POST['evsdisable'] ) ? 'yes' : '' );


		if (isset( $_POST['thumbloc'] )) {
	update_post_meta( $post_id, 'thumbloc', $_POST['thumbloc'] );
	}

		if (isset($_POST['thumbtitle'] )) {
	update_post_meta( $post_id, 'thumbtitle', $_POST['thumbtitle'] );
	}

		if (isset( $_POST['thumbdesc'] )) {
	update_post_meta( $post_id, 'thumbdesc', $_POST['thumbdesc'] );
	}

		if (isset($_POST['thumbdate'] )) {
	update_post_meta( $post_id, 'thumbdate', $_POST['thumbdate'] );
	}

		if (isset($_POST['thumbplayer'])) {
	update_post_meta( $post_id, 'thumbplayer', $_POST['thumbplayer'] );
	}

		if (isset($_POST['thumbfileloc'])) {
	update_post_meta( $post_id, 'thumbfileloc', $_POST['thumbfileloc'] );
	}

		if (isset($_POST['thumbduration'])) {
	update_post_meta( $post_id, 'thumbduration', $_POST['thumbduration'] );
	}

		if (isset($_POST['thumbloc'])) {
	update_post_meta( $post_id, 'family', $_POST['family'] );
	}

		if ( isset($_POST['thumbauthor']) && isset( $_POST['thumbloc'] ) ) {
	update_post_meta( $post_id, 'thumbauthor', $_POST['thumbauthor'] );
	}

		if( isset( $_POST['thumbauthorname'] ) && isset( $_POST['thumbloc'] ) ) {
	update_post_meta( $post_id, 'thumbauthorname', $_POST['thumbauthorname'] );
	}



		if ( isset($_POST['thumbpubdate'] )) {
	update_post_meta( $post_id, 'thumbpubdate', $_POST['thumbpubdate'] );
	}



	}



    function evs_ajax_callback() {
	if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
	}

	if (isset($_POST['post_meta'])) {
    $post_meta = $_POST['post_meta'];
	}

	if (isset($_POST['field_name'])) {
    $fieldname = $_POST['field_name'];
	}




    if ( (isset($post_id)) && (isset($fieldname)) && (isset($post_meta)) ) {
	update_post_meta( $post_id, $fieldname, $post_meta );
    }
	echo 'All Video Seo inputs has beed updated successfully.';
    die();
}


add_action( 'save_post', 'evssave_custom_url10',7 );
add_action( 'admin_init', 'evs_custom_metabox10',6 );
add_action( 'wp_ajax_update_meta', 'evs_ajax_callback');







/**
 * Add meta box
 */

function evs_custom_metabox10() {

foreach ( get_post_types( array( 'public' => true ) ) as $evsposttype ) {

			add_meta_box( 'evs-metabox02', __( 'video seo  ' ,'evsseo'), 'evs_video_seo_metabox', $evsposttype, 'normal', 'high' );
		}
}


?>
