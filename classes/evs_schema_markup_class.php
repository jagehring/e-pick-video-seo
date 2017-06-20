<?php
class evs_schema_markup_class {
     public function __construct() {
	  global $evs_options;
	 if (!isset($evs_options['evs_rich']) ) {
	  add_action('the_content', array(&$this, 'evs_schema_markup_function'));
	  }

	 }

	 public function evs_schema_markup_function($content) {
	     global $post;
    $thumbloc       = get_post_meta( $post->ID, 'thumbloc', true );
    $thumbtitle     = get_post_meta( $post->ID, 'thumbtitle', true );
    $thumbdesc      = get_post_meta( $post->ID, 'thumbdesc', true );
    $thumbplayer    = get_post_meta( $post->ID, 'thumbplayer', true );
    $thumbduration  = get_post_meta( $post->ID, 'thumbduration', true );
    $thumbdate      = get_post_meta( $post->ID, 'thumbdate', true );
    $family         = get_post_meta( $post->ID, 'family', true );
    $thumbpubdate   = get_post_meta( $post->ID, 'thumbpubdate', true );
    $evsdisable     = get_post_meta( $post->ID, 'evsdisable', true );

    if (((is_single()) || (is_page())) && ($thumbloc !='') && ($evsdisable != "yes")) {
    $extra_content='<div class="hidden" itemprop="video" itemscope itemtype="http://schema.org/VideoObject" >
<meta itemprop="name" content="'.$thumbtitle.'" />
<meta itemprop="duration" content="'.$thumbduration.'S" />
<meta itemprop="thumbnailurl" content="'.$thumbloc.'" />
<span itemprop="description">'.$thumbdesc.'</span>
<span itemprop="transcript">'.$thumbdate.'</span>
<meta itemprop="uploadDate" content="'.$thumbpubdate.'">
<meta itemprop="embedUrl" content="'.$thumbplayer.'">
</div>';

     $content .= $extra_content;

    }
    return $content;
	 }
}

new evs_schema_markup_class();
?>
