<?php
class evs_generate_video_sitemap {
     public function __construct() {
	 global $evs_options;
	 add_action('wp_ajax_update_evssitemap', array(&$this, 'evs_video_sitemap_ajax_generate'));
	 if  ((isset($evs_options['autoupdate'])) && ($evs_options['autoupdate'] == "on") )  {
         add_action('draft_to_publish', array(&$this, 'evs_generate_video_sitemap_function'));
		 add_action('new_to_publish', array(&$this, 'evs_generate_video_sitemap_function'));
		 add_action('pending_to_publish', array(&$this, 'evs_generate_video_sitemap_function'));
		 add_action('private_to_publish', array(&$this, 'evs_generate_video_sitemap_function'));
		 add_action('publish_to_publish', array(&$this, 'evs_generate_video_sitemap_function'));

     }

	 }

    public function evs_video_sitemap_ajax_generate() {
    $this->evs_generate_video_sitemap();
	die();
    }

	public function evs_generate_video_sitemap() {
	$this->evs_generate_video_sitemap_function();
	global $evs_options;
	if (isset($evs_options['xmltitle']) && ($evs_options['xmltitle'] == "on") && ($evs_options['xmltitlename'] != '')) {
	$sitemaptitle=$evs_options['xmltitlename'];
    } else {
	$sitemaptitle='video-sitemap';
    }
    if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {
    echo 'Your <a href="'.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'.xml">video sitemap</a> has been updated successfully.';
    } else {
	echo 'Your <a href="'.site_url().'/'.$sitemaptitle.'.xml">video sitemap</a> has been updated successfully.';
	}
	}

	public function evs_generate_video_sitemap_function()
    {

     global $post;

     global $evs_options;

        if (isset($evs_options['xmltitle']) && ($evs_options['xmltitle'] == "on") && ($evs_options['xmltitlename'] != '')) {
	        $sitemaptitle=$evs_options['xmltitlename'];
        } else {
	        $sitemaptitle='video-sitemap';
        }

     $videopost_types=get_post_types();

     $videoposttypes_array = array();
     foreach ($videopost_types  as $videopost_type ) {
     $videoposttypes_array[] = $videopost_type;
     }

     $args=array(
     'numberposts'=> -1,
     'orderby'=>'modified',
     'post_type'  => $videoposttypes_array
     );


     $videos =get_posts( $args );
	 $videos = json_decode(json_encode($videos), true);


	 if ( isset($evs_options['multiple'])) {
     $sitevideocounts  = count($videos);

	 $allowedentries   = $evs_options['multiplenumber'];

	 $numberofsitemaps = $sitevideocounts / $allowedentries;
	 $numberofsitemaps = (int)$numberofsitemap;
	 $numberofsitemaps = $numberofsitemap + 1;
	 }

     $sitemap  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
      if ( isset($evs_options['multiple']) && ($sitevideocounts > $allowedentries)) {
	 $sitemap .= '<?xml-stylesheet type="text/xsl" href="' . site_url() . '/wp-content/plugins/e-pick-video-seo/videoindex.xsl"?>' . "\n";
	 } else {
     $sitemap .= '<?xml-stylesheet type="text/xsl" href="' . site_url() . '/wp-content/plugins/e-pick-video-seo/videostyle.xsl"?>' . "\n";
	}

	if ( isset($evs_options['multiple']) &&  ($sitevideocounts >  $allowedentries)) {
	$sitemap .='<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
	} else {
	$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . "\n";
	}



	  if (( isset($evs_options['multiple']) ) && ($sitevideocounts >  $allowedentries)) {

	 $counter = 0;
	 $sitemapcount= 1 ;
	 $childsitemapheader  = '';
	 $childsitemapheader .= '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
     $childsitemapheader .= '<?xml-stylesheet type="text/xsl" href="' . site_url() . '/wp-content/plugins/e-pick-video-seo/videostyle.xsl"?>' . "\n";
	 $childsitemapheader .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . "\n";
	 $childsitemapcontent[$sitemapcount] = '';
	 $childsitemapfooter  = '</urlset>';

	 foreach ($videos as $video) {



	 $vid = $video['ID'];



     $vidpermalink    = get_permalink($vid);
     $thumbloc        = get_post_meta( $vid, 'thumbloc', true );
     $thumbtitle      = get_post_meta( $vid, 'thumbtitle', true );
     $thumbtitle2     = '<![CDATA['.$thumbtitle.']]>';
     $thumbdesc       = get_post_meta( $vid, 'thumbdesc', true );
     $thumbdesc2      = '<![CDATA['.$thumbdesc.']]>';
     $thumbdate       = get_post_meta( $vid, 'thumbdate', true );
     $thumbplayer     = get_post_meta( $vid, 'thumbplayer', true );
     $thumbfileloc    = get_post_meta( $vid, 'thumbfileloc', true );
     $thumbduration   = get_post_meta( $vid, 'thumbduration', true );
     $thumbauthor     = get_post_meta( $vid, 'thumbauthor', true );
     $thumbauthorname = get_post_meta( $vid, 'thumbauthorname', true );
     $thumbpubdate    = get_post_meta( $vid, 'thumbpubdate', true );
     $family          = get_post_meta( $vid, 'family', true );
     $evsdisable      = get_post_meta( $vid, 'evsdisable', true );

     $videocategories = get_the_category($vid);
	 $videocategory   = $videocategories[0]->cat_name;

	 $videotags       = wp_get_post_tags($vid);



     if ($family) {$thumbfamily = 'no';} else {$thumbfamily = 'yes';}
					$permalink = get_permalink($vid);
					$videotitle = get_the_title($vid);



					if (($thumbloc) && ($evsdisable != "yes"))  {
					$childsitemapcontent[$sitemapcount] .= "<url>\n";
					$childsitemapcontent[$sitemapcount] .= " <loc>$vidpermalink</loc>\n"; }



					if (($thumbloc) && ($evsdisable != "yes")) {
					$childsitemapcontent[$sitemapcount] .= " <video:video>\n";
					$childsitemapcontent[$sitemapcount] .= " <video:thumbnail_loc>$thumbloc</video:thumbnail_loc>\n"; }
					if (($thumbtitle) && ($thumbloc) && ($evsdisable != "yes") )  {
					$childsitemapcontent[$sitemapcount] .= " <video:title>$thumbtitle2</video:title>\n"; }
					if (($thumbdesc) && ($thumbloc) && ($evsdisable != "yes") )  {
					$childsitemapcontent[$sitemapcount] .= " <video:description>$thumbdesc2</video:description>\n"; }

					if (($thumbdate) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:transcript>$thumbdate</video:transcript>\n"; }

					if (($thumbfamily) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:family_friendly>$thumbfamily</video:family_friendly>\n"; }

					if (($thumbplayer) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:player_loc allow_embed='yes' >$thumbplayer</video:player_loc>\n";
					}

					if (($thumbfileloc) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:content_loc>$thumbfileloc</video:content_loc>\n";
					}

					if ((($videocategory) && ($videocategory != "Uncategorized")) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:category>$videocategory</video:category>\n";
					}
					foreach ($videotags as $tag) {
					$videotag        = $tag->name;
					if (($videotag) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:tag>$videotag</video:tag>\n";
					}
					}

					if (($thumbduration) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:duration>$thumbduration</video:duration>\n";
					}
					if (($thumbauthor) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:uploader info='$thumbauthor'>$thumbauthorname</video:uploader>\n";
					}
					if (($thumbpubdate) && ($thumbloc) && ($evsdisable != "yes") ) {
					$childsitemapcontent[$sitemapcount] .= " <video:publication_date>$thumbpubdate</video:publication_date>\n";
					}
					if (($thumbloc) && ($evsdisable != "yes"))
					{ $childsitemapcontent[$sitemapcount] .= " </video:video>\n"; }

					if (($thumbloc) && ($evsdisable != "yes")) {
					$childsitemapcontent[$sitemapcount] .= "</url>\n"; }



	    if ( ($counter % $allowedentries == 0) && ($childsitemapcontent[$sitemapcount] != '')) {

		$childsitemap = $childsitemapheader . $childsitemapcontent[$sitemapcount] . $childsitemapfooter ;

		if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {

		 if (isset($evs_options['gzip'])) {
		 $fp = gzopen(ABSPATH . "".$evs_options['foldername']."/".$sitemaptitle."-".$sitemapcount.".xml.gz", 'w');
		 $sitemapurl=''.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'-'.$sitemapcount.'.xml.gz';
		 } else {
		 $fp = fopen(ABSPATH . "".$evs_options['foldername']."/".$sitemaptitle."-".$sitemapcount.".xml", 'w');
	     $sitemapurl=''.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'-'.$sitemapcount.'.xml';
		 }
	    } else {
		if (isset($evs_options['gzip'])) {
		  $fp = gzopen(ABSPATH . "".$sitemaptitle."-".$sitemapcount.".xml.gz", 'w');
		 $sitemapurl=''.site_url().'/'.$sitemaptitle.'-'.$sitemapcount.'.xml.gz';
		 } else {
	     $fp = fopen(ABSPATH . "".$sitemaptitle."-".$sitemapcount.".xml", 'w');
		 $sitemapurl=''.site_url().'/'.$sitemaptitle.'-'.$sitemapcount.'.xml';
		 }
	    }

		if (isset($evs_options['gzip'])) {
		gzwrite($fp, $childsitemap);
        gzclose($fp);
		} else {
	    fwrite($fp , $childsitemap);
	    fclose($fp);
		}

		$date     =$video['post_modified'];
		$sitemap .= "<sitemap>\n";
	    $sitemap .= "<loc>$sitemapurl</loc>\n";
		$sitemap .= "<lastmod>" . htmlspecialchars( $date ) . "</lastmod>\n";
		$sitemap .= "</sitemap>\n";
	    $sitemapcount++;

		}

    if (($thumbloc) && ($evsdisable != "yes")) {
	$counter++;
	}
	}
	$sitemap .= '</sitemapindex>';

	} else {

     foreach ($videos as $video) {
	 $vid = $video['ID'];
     $vidpermalink    = get_permalink($vid);
     $thumbloc        = get_post_meta( $vid, 'thumbloc', true );
     $thumbtitle      = get_post_meta( $vid, 'thumbtitle', true );
     $thumbtitle2     = '<![CDATA['.$thumbtitle.']]>';
     $thumbdesc       = get_post_meta( $vid, 'thumbdesc', true );
     $thumbdesc2      = '<![CDATA['.$thumbdesc.']]>';
     $thumbdate       = get_post_meta( $vid, 'thumbdate', true );
     $thumbplayer     = get_post_meta( $vid, 'thumbplayer', true );
     $thumbfileloc    = get_post_meta( $vid, 'thumbfileloc', true );
     $thumbduration   = get_post_meta( $vid, 'thumbduration', true );
     $thumbauthor     = get_post_meta( $vid, 'thumbauthor', true );
     $thumbauthorname = get_post_meta( $vid, 'thumbauthorname', true );
     $thumbpubdate    = get_post_meta( $vid, 'thumbpubdate', true );
     $family          = get_post_meta( $vid, 'family', true );
     $evsdisable      = get_post_meta( $vid, 'evsdisable', true );

	 $videocategories = get_the_category($vid);
     if (!empty($videocategories))
	 $videocategory   = $videocategories[0]->cat_name;

	 $videotags       = wp_get_post_tags($vid);

     if ($family) {$thumbfamily='no';} else {$thumbfamily='yes';}
					$permalink = get_permalink($vid);
					$videotitle = get_the_title($vid);



					if (($thumbloc) && ($evsdisable != "yes"))  {
					$sitemap .= "<url>\n";
					$sitemap .= " <loc>$vidpermalink</loc>\n"; }



					if (($thumbloc) && ($evsdisable != "yes")) {
					$sitemap .= " <video:video>\n";
					$sitemap .= " <video:thumbnail_loc>$thumbloc</video:thumbnail_loc>\n"; }
					if (($thumbtitle) && ($thumbloc) && ($evsdisable != "yes") )  {
					$sitemap .= " <video:title>$thumbtitle2</video:title>\n"; }
					if (($thumbdesc) && ($thumbloc) && ($evsdisable != "yes") )  {
					$sitemap .= " <video:description>$thumbdesc2</video:description>\n"; }

					if (($thumbdate) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:transcript>$thumbdate</video:transcript>\n"; }

					if (($thumbfamily) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:family_friendly>$thumbfamily</video:family_friendly>\n"; }

					if (($thumbplayer) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:player_loc allow_embed='yes' >$thumbplayer</video:player_loc>\n";
					}

					if (($thumbfileloc) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:content_loc>$thumbfileloc</video:content_loc>\n";
					}

					if (($thumbduration) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:duration>$thumbduration</video:duration>\n";
					}

					if ((($videocategory) && ($videocategory != "Uncategorized")) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:category>$videocategory</video:category>\n";
					}

						foreach ($videotags as $tag) {
					$videotag        = $tag->name;
					if (($videotag) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:tag>$videotag</video:tag>\n";
					}
					}

					if (($thumbauthor) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:uploader info='$thumbauthor'>$thumbauthorname</video:uploader>\n";
					}
					if (($thumbpubdate) && ($thumbloc) && ($evsdisable != "yes") ) {
					$sitemap .= " <video:publication_date>$thumbpubdate</video:publication_date>\n";
					}
					if (($thumbloc) && ($evsdisable != "yes"))
					{$sitemap .= " </video:video>\n";}

					if (($thumbloc) && ($evsdisable != "yes")) {
					$sitemap .= "</url>\n"; }




						}



        $sitemap .= '</urlset>';




    }

    if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {
	$fp = fopen(ABSPATH . "".$evs_options['foldername']."/".$sitemaptitle.".xml", 'w');
	$sitemapurl=''.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'.xml';
	} else {
	$fp = fopen(ABSPATH . "".$sitemaptitle.".xml", 'w');
	$sitemapurl=''.site_url().'/'.$sitemaptitle.'.xml';
	}


	fwrite($fp , $sitemap);
	fclose($fp );
	update_option('evs_sitemap_url',$sitemapurl);
    update_option('evs_sitemap_generation_time',''.current_time( 'mysql' ).'');


	}


}
new evs_generate_video_sitemap();
?>
