<?php
class evs_ping_sitemap_class {
    public function __construct() {
	global $evs_options;
	 add_action('wp_ajax_ping_videositemap', array(&$this, 'evs_ajax_ping_sitemap'));
	 
	  if ( (isset($evs_options['autoping'])) && ($evs_options['autoping'] == "on") ) {
   
     
    
   add_action('save_post', array(&$this, 'evs_ping_sitemap_function_with_post_update'));
   add_action('draft_to_publish', array(&$this, 'evs_ping_sitemap_function_with_post_update'));
   add_action('pending_to_publish', array(&$this, 'evs_ping_sitemap_function_with_post_update'));
   
   
   }
	 
	}
	public function evs_ajax_ping_sitemap() {
	$this->evs_ping_sitemap_function();
	die();
	}
	
	public function evs_ping_sitemap_function() {
     global $evs_options;
	
	if (isset($evs_options['xmltitle']) && ($evs_options['xmltitle'] == "on") && ($evs_options['xmltitlename'] != '')) {
	$sitemaptitle=$evs_options['xmltitlename'];
    } else {
	$sitemaptitle='video-sitemap';
    }
    
	if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {
	$evssitemapurl=''.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'.xml';
	} else {
	$evssitemapurl=''.site_url().'/'.$sitemaptitle.'.xml';
	}

    $this->ping_search_engines($evssitemapurl,'google');

    $this->ping_search_engines($evssitemapurl,'bing');

    
    }
	
	public function evs_ping_sitemap_function_with_post_update() {
     global $evs_options;
	 
	if (isset($evs_options['xmltitle']) && ($evs_options['xmltitle'] == "on") && ($evs_options['xmltitlename'] != '')) {
	$sitemaptitle=$evs_options['xmltitlename'];
    } else {
	$sitemaptitle='video-sitemap';
    }
	
    if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {
	$evssitemapurl=''.site_url().'/'.$evs_options['foldername'].'/'.$sitemaptitle.'.xml';
	} else {
	$evssitemapurl=''.site_url().'/'.$sitemaptitle.'.xml';
	}
	

    $this->ping_search_engines_with_post_update($evssitemapurl,'google');

    $this->ping_search_engines_with_post_update($evssitemapurl,'bing');

    
    }
	
	
	public function ping_search_engines($evssitemapurl,$searchengine) {

	switch ($searchengine) {
		case 'bing':
			$pingurl = "http://www.bing.com/webmaster/ping.aspx?siteMap=$evssitemapurl";
			break;
		
		case 'google':
			$pingurl = "http://www.google.com/webmasters/sitemaps/ping?sitemap=$evssitemapurl";
			break;
		
		default:
      		 return false;
	}

	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,$pingurl);
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);

	if (empty($buffer))
	{
		echo '<tr><td><font size="02" color="black">'.__('Ping to ','evsseo').'<a href="'.$pingurl.'"><font size="02" color="green">'.$searchengine.'</font></a> '.__('was unsuccessful.Please try again later','evsseo').'.</font></td></tr><br />';
	     $currenttime    = 'unsuccessfull ping at '.current_time( 'mysql' ).' ';
		update_option('evs_ping_time',$currenttime);
	}
	else
	{
		echo '<tr><td><font size="02" color="black">'.__('Your sitemap is successfully notified to ','evsseo').' <a href="'.$pingurl.'"><font size="02" color="green">'.$searchengine.'</font></a>.</font></td></tr><br />';
		$currenttime    = current_time( 'mysql' );
	    update_option('evs_ping_time',$currenttime);
	}

    }
	
	public function ping_search_engines_with_post_update($evssitemapurl,$searchengine) {

	switch ($searchengine) {
		case 'bing':
			$pingurl = "http://www.bing.com/webmaster/ping.aspx?siteMap=$evssitemapurl";
			break;
		
		case 'google':
			$pingurl = "http://www.google.com/webmasters/sitemaps/ping?sitemap=$evssitemapurl";
			break;
		
		default:
      		 return false;
	}

	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,$pingurl);
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);

	if (empty($buffer))
	{
		$currenttime    = 'unsuccessfull ping at '.current_time( 'mysql' ).' ';
		update_option('evs_ping_time',$currenttime);
	}
	else
	{
		$currenttime    = current_time( 'mysql' );
	    update_option('evs_ping_time',$currenttime);
	}

    }
	

}
new evs_ping_sitemap_class();
?>