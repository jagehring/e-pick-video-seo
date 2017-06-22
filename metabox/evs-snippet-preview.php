 <br />
<table>


	<td>
<style>
#snippet {
        height: 67px;
        width: 116px;
        float: left;
        position: relative;
        }
 .imgA1 {
        height:67px;
        width:116px;
        position:absolute;
        bottom:0;
        right:0;
        top:0;
        left:0;
        }
 .playbox {
    position:absolute;
    bottom:0;
    right:0;
    top:38px;
    background-color: black;
    height:16px;
    width:auto;
    }
  #snippet2 {
    position:absolute;
    left:135px;
    height: 67px;
    width: auto;
    }

</style>

	<div id="snippet">
		<a href="<?php if ($thumbplayer) {echo $thumbplayer;} elseif ($evsvideurl) {echo $evsvideurl;} else {echo get_permalink( $post->ID );} ?>" target="_blank">
	             <img class="imgA1" src="<?php if ($thumbloc) {echo $thumbloc;} elseif ($evsthumburl) {echo $evsthumburl; } else {echo ''.evs_PLUGIN_URL.'images/defaultvideo.png';}   ?>" >

                <div >
			<p class="playbox">
				<img  src="<?php echo evs_PLUGIN_URL; ?>/images/play.png" width="10" height="10">
				     <b><font color="white" size="01px"><?php  echo floor($evslength/60) . ":" . $evslength % 60; ?></font></b>
			</p>
		</div>
	</a>
	</div>




	<div id="snippet2">
    <a href="<?php echo get_permalink( $post->ID ); ?>"><font size="4" color="blue"><?php if ($evstitle) {echo $evstitle;} elseif ($thumbtitle) {echo $thumbtitle;} else {echo get_the_title();} ?></font></a><br />
<a href="<?php echo get_permalink( $post->ID ); ?>"><font size="3" color="green"><?php echo get_permalink( $post->ID ); ?></font> </a><br />
<font size="03"><?php if ($evspubdate) { echo $evspubdate;}?>&nbsp;-&nbsp;Uploaded by <?php if ($thumbauthorname) {echo $thumbauthorname;} ?></font><br />
	<font color="black" align="right" size="03"><?php
	if ($evstitle) {$evstitle2=trim(preg_replace('/\s+&/',' ', $evstitle)); }
	if ($evsdesc2) { $evsdesc3=trim(preg_replace('/\s+&/',' ', $evsdesc2)); }
	if ($evsdesc2) { $evsdesc4=preg_replace( '/\s+/', ' ', $evsdesc2 ); }
	if ($thumbdesc) { $thumbdesc2=preg_replace('/\s+/', ' ', $thumbdesc); }
	if (isset($evsdesc4)) { $evsdesc5=preg_replace("/[^A-Za-z0-9]/", " ", $evsdesc4 ); }
	if (isset($thumbdesc2)) { $thumbdesc3=preg_replace("/[^A-Za-z0-9]/", " ", $thumbdesc2); }
	if ($evstitle) {$evstitle3=preg_replace("/[^A-Za-z0-9]/", " ", $evstitle ); }
	if ($thumbtitle) {$thumbtitle2=preg_replace("/[^A-Za-z0-9]/", " ", $thumbtitle ); }
	if ($thumbdesc) {$evssnippetdesc=substr($thumbdesc, 0, 156);}
	   elseif ($evsdesc3) {$evssnippetdesc=substr($evsdesc3, 0, 156);}
	   else {$evspreviewdescription = $post->post_content;
	         $string = trim(strip_tags($evspreviewdescription));
             $evssnippetdesc = substr($string, 0, 156);}
	if ($evssnippetdesc) {echo $evssnippetdesc;}



	 ?></font>
	</div>
	</td></tr>

</table>
	 <br />
