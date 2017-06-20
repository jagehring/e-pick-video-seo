<?php
class evs_opengraph_meta_tags {
     public function __construct() {
	  global $evs_options;
	 if (!isset($evs_options['opengraph']) ) {
	  add_action('wp_head', array(&$this, 'evs_opengraph_metatags_function'));
	  }
	  
	 }
	 
	 public function evs_opengraph_metatags_function() {
	     global $post;
    $thumbloc       = get_post_meta( $post->ID, 'thumbloc', true );
    $thumbtitle     = get_post_meta( $post->ID, 'thumbtitle', true );
    $thumbdesc      = get_post_meta( $post->ID, 'thumbdesc', true );
    $thumbplayer    = get_post_meta( $post->ID, 'thumbplayer', true );
    $thumbduration  = get_post_meta( $post->ID, 'thumbduration', true );
    $family         = get_post_meta( $post->ID, 'family', true );
    $thumbpubdate   = get_post_meta( $post->ID, 'thumbpubdate', true );
	$evsdisable     = get_post_meta( $post->ID, 'evsdisable', true );

    if (((is_single()) || (is_page())) && ($thumbloc !='') && ($evsdisable != "yes")) {
    $extra_content='<meta property="og:type" content="video.movie" />
<meta property="og:title" content="'.$thumbtitle.'" />
<meta property="og:video" content="'.$thumbplayer.'" />
<meta property="og:video:type" content="application/x-shockwave-flash" />
<meta property="og:video:width" content="640" />
<meta property="og:video:height" content="390" />
<meta property="og:image" content="'.$thumbloc.'" />';
    }
    echo $extra_content;
	 }
}

new evs_opengraph_meta_tags();
?>