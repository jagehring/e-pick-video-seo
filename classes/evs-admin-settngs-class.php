<?php
class evs_admin_settings_class {
    public function __construct() {
	add_action('admin_enqueue_scripts', array(&$this, 'evs_register_scripts'));
	add_action('wp_ajax_evs_onload', array(&$this, 'evs_onload_function'));
	add_action('admin_menu', array(&$this, 'evs_add_options_link'));
	add_action('admin_init', array(&$this, 'evs_register_settings'));




	}

	 public function evs_add_options_link() {

	 add_menu_page(''.__('Video Seo Plugin Options','evsseo').'',''.__('Video Seo ','evsseo').'','manage_options','evs-options',array(&$this, 'evs_options_page'));

	 add_submenu_page( 'evs-options', ''.__('Sitemap ','evsseo').'',''.__('Sitemap ','evsseo').'' , 'manage_options', 'sitemap-settings', array(&$this, 'evs_sitemap_settings') );

	}




	 public function evs_options_page() {
     $options = get_option('evs_settings');
     global $evs_options;
     ob_start(); ?>

	  <div class="wrap">




	 <form method="post" action="options.php">

	 <?php settings_fields('evs_settings_group');  wp_enqueue_script('evs2'); wp_enqueue_style('evs1'); ?>
	 <table class="widefat">
      <thead>
        <tr>
          <th scope="col" style="width: 40%;"><?php echo __('Video Seo Settings','evsseo'); ?></th><th></th>
        </tr>
      </thead>


    <tr> <td><label class="checkbox" for="evs_settings[evs_rich]" ><font size="02"> <?php echo __('Disable schema.org markup on video pages for rich snippets(not recommended)','evsseo'); ?></font></td>
    <td>
	<div class="toggle">
	<input type="checkbox" name="evs_settings[evs_rich]" id="evs_settings[evs_rich]" class="toggle-checkbox" value="yes" <?php if (isset($evs_options['evs_rich'])) { echo 'checked';}  ?> />
    <label class="toggle-label" for="evs_settings[evs_rich]">
    <div class="toggle-internal"></div>
	</label></td></tr>
	    <tr> <td><label class="checkbox" for="evs_settings[opengraph]" ><font size="02"> <?php echo __('Disable Opengraph video meta tags(not recommended)','evsseo'); ?></font></td>
    <td>
	<div class="toggle">
	<input type="checkbox" name="evs_settings[opengraph]" id="evs_settings[opengraph]" class="toggle-checkbox" value="yes" <?php if (isset($evs_options['opengraph'])) { echo 'checked';}  ?> />
    <label class="toggle-label" for="evs_settings[opengraph]">
    <div class="toggle-internal"></div>
	</label></td></tr>
     <tr>
		 <td>
		 <label for="evs_settings[autoupdate]"><font size="02"><?php _e( 'Automatically update sitemap when video Post is updated(recommended)', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="evs_settings[autoupdate]" name="evs_settings[autoupdate]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['autoupdate'])) {echo "checked";}?> />
		  <label class="toggle-label" for="evs_settings[autoupdate]">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
      		 <tr>
		 <td>
		 <label for="evs_settings[autoping]"><font size="02"><?php _e( 'Automatically ping sitemap when video Post has been created', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="evs_settings[autoping]" name="evs_settings[autoping]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['autoping'])) {echo "checked";}?> />
		  <label class="toggle-label" for="evs_settings[autoping]">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
	 <tr>
		 <td>
		 <label for="evs_settings[xmltitle]"><font size="02"><?php _e( 'use different xml sitemap name', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="_xmltitletrcheckbox" name="evs_settings[xmltitle]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['xmltitle'])) {echo "checked";}?> />
		  <label class="toggle-label" for="_xmltitletrcheckbox">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
		 <tr id="_xmltitletr" style="<?php if (!isset($evs_options['xmltitle'])) { echo "display:none;"; }  ?>">
		 <td>
		 <label for="evs_settings[xmltitlename]"><font size="02"><?php _e( 'file name', 'evs' ); ?></font></label>

		 </td>
		 <td class="widefat">

       <input id="evs_settings[xmltitlename]" name="evs_settings[xmltitlename]"  type="text" value="<?php if ((isset($evs_options['xmltitlename'])) && ($evs_options['xmltitlename'] != '')) { echo $evs_options['xmltitlename']; } else { echo "video-sitemap"; }?>"    />.xml


		 </td>
		 </tr>

		 	 <tr>
		 <td>
		 <label for="evs_settings[multiple]"><font size="02"><?php _e( 'Enable Mulitple Sitemap Mode', 'evs' ); ?></font></label>
		 <p><font size="01"><?php _e('Google recommend maximum 500 entries per sitemap . Enable this if you have more then 500 videos. ','evs'); ?> </font></p>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="_multiplecheckbox" name="evs_settings[multiple]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['multiple'])) {echo "checked";}?> />
		  <label class="toggle-label" for="_multiplecheckbox">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
		 <tr id="_multipletr" style="<?php if (!isset($evs_options['multiple'])) { echo "display:none;"; }  ?>">
		 <td>
		 <label for="evs_settings[multiplenumber]"><font size="02"><?php _e( 'Maximum Entries Per Sitemap', 'evs' ); ?></font></label>
		 <p><font size="01"><?php _e('It must not exceed 500. If total site videos are less then this number then common video sitemap will be generated. ','evs'); ?> </font></p>
		 </td>
		 <td class="widefat">

       <input id="evs_settings[multiplenumber]" name="evs_settings[multiplenumber]"  type="number" min="1" max="500" value="<?php if ((isset($evs_options['multiple'])) && ($evs_options['multiplenumber'] != '')) { echo $evs_options['multiplenumber']; } else { echo "500"; }?>"    />


		 </td>
		 </tr >
		 <tr id="_multipletr2" style="<?php if (!isset($evs_options['multiple'])) { echo "display:none;"; }  ?>">
		 <td>
		 <label for="evs_settings[gzip]"><font size="02"><?php _e( 'Use gzipped sitemap files instead of xml', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="evs_settings[gzip]" name="evs_settings[gzip]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['gzip'])) {echo "checked";}?> />
		  <label class="toggle-label" for="evs_settings[gzip]">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>

		 <tr>
		 <td>
		 <label for="evs_settings[folder]"><font size="02"><?php _e( 'Write sitemaps into a folder', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		 <div class="toggle">
       <input id="_foldernamecheckbox"  name="evs_settings[folder]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['folder'])) {echo "checked";}?> />
		  <label class="toggle-label" for="_foldernamecheckbox">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
		 <tr id="_foldernametr" style="<?php if (!isset($evs_options['folder'])) { echo "display:none;"; }  ?>">
		 <td>
		 <label for="evs_settings[foldername]"><font size="02"><?php _e( 'folder name', 'evs' ); ?></font></label>
		 <p><font size="01"> <?php echo __('Folder will be created by plugin so do not create it ','evs'); ?> </font></p>
		 </td>
		 <td class="widefat">

       <input id="evs_settings[foldername]" name="evs_settings[foldername]"  type="text" value="<?php if (isset($evs_options['foldername'])) { echo $evs_options['foldername']; } else { echo "sitemap"; }?>"    />


		 </td>
		 </tr>

		 <tr>
		 <td>
		 <label for="evs_settings[robots]"><font size="02"><?php _e( 'Add sitemap index file to robots.txt', 'evs' ); ?></font></label>
		 </td>
		 <td class="widefat">
		  <div class="toggle">
       <input id="evs_settings[robots]" name="evs_settings[robots]" class="toggle-checkbox" type="checkbox" value="on"   <?php if (isset($evs_options['robots'])) {echo "checked";}?> />
		   <label class="toggle-label" for="evs_settings[robots]">
                <div class="toggle-internal"></div>
		 </td>
		 </tr>
     <tr>
     <td>
     <label for="evs_settings[api]"><font size="02"><?php _e( 'Add YouTube api', 'evs' ); ?></font></label>
     </td>
     <td class="widefat">
      <div class="toggle">
       <input id="evs_settings[api]" name="evs_settings[api]" class="" type="text" value="<?= $options['api'] ?>" />
       <label class="toggle-label" for="evs_settings[api]">

     </td>
     </tr>


    	<?php
		$sitemaplocaton = get_option('evs_sitemap_url');
		if (isset($evs_options['robots'])) {
    $file = ''.ABSPATH.'robots.txt';

    $sitemapurl="Sitemap: $sitemaplocaton \n";
    // Open the file to get existing content
    $current = file_get_contents($file);
    $current = str_replace($sitemapurl, "", $current);
    $current .= $sitemapurl;
    // Write the contents back to the file
    file_put_contents($file, $current);
	} else  {
	 $file = ''.ABSPATH.'robots.txt';
	$sitemapurl="Sitemap: $sitemaplocaton \n";
    // Open the file to get existing content
    $current = file_get_contents($file);
    $current = str_replace($sitemapurl, "", $current);

    file_put_contents($file, $current);
	}

	if ( isset($evs_options['folder']) && $evs_options['foldername'] !='' ) {
	 $dir="".ABSPATH."/".$evs_options['foldername']."";
	   if (!is_dir($dir)) {
	   mkdir($dir, 0700);
	   }
	}
	?>


    </table>
    <div id="evsveifystatus" style="display:none; background-color:#ffffe0; border-color: #e6db55;  border-width: 1px; border-style: solid; width :auto; height:auto;"> </div>

		<br />		<br /><br />
    <center>	 <input type="submit" value="Update options" class="button-primary" /></center> </center>
     </form>

	 </div>

     <br /><br />






	 <br />

	 <?php


    }

	 public function evs_sitemap_settings() {
	 ?>
	 <div class="wrap">
     <?php global $evs_sitemap_options; ?>
    <form method="post" action="options.php">
	 <?php
     wp_enqueue_script('evs1');	 ?>
	<table class="widefat">
      <thead>
        <tr>
          <th scope="col" style="width: 40%;"><?php echo __('Sitemap Actions','evs'); ?></th><th></th>
        </tr>
      </thead>

        <tbody>
	<tr><td><?php _e('Sitemap Address','evs'); ?></td> <td><?php if (get_option('evs_sitemap_url') != "Not generated yet") { ?> <a href="<?php echo get_option('evs_sitemap_url'); ?>"><?php echo get_option('evs_sitemap_url'); ?></a> <?php } else { echo "Not generated yet"; } ?></td></tr>
   <tr><td><font size="02" style="float:left"><?php echo __('Click on Generate sitemap to generate your sitemap ','evs'); ?></font></td><td><div style="float:left;">&emsp;&emsp;&emsp;</div><input id="evsgeneratesitemap" type="button" value="Generate Sitemap" class="button-primary" style="float:left;"  /><img  src="<?php echo evs_PLUGIN_URL; ?>/images/ajax-loader.gif"  class="waiting" id="evsgenerate" style="display:none; float:left;">&emsp;&emsp;&emsp;<b><?php _e('Previously Generated On','evs'); ?>:</b><font color="green"><b><?php echo get_option('evs_sitemap_generation_time'); ?></b></font></td>
   <tr><td><font size="02" style="float:left"><?php echo __('Click on Ping sitemap to notify sitemap to search engines','evs'); ?></font></td><td><div style="float:left;">&emsp;&emsp;&emsp;</div><input id="evspingsitemap" type="button" value="Notify search Engines" class="button-primary" style="float:left;"  /><img  src="<?php echo evs_PLUGIN_URL; ?>/images/ajax-loader.gif"  class="waiting" id="evsping" style="display:none; float:left;">&emsp;&emsp;<b><?php _e('Previous Ping Time','evs'); ?>:</b><font color="green"><b><?php echo get_option('evs_ping_time'); ?></b></font></td>






	  </tbody>

	 </table>
    <br /><br />
    <div id="evssitemapgeneratestatus" style="display:none; background-color:#ffffe0; border-color: #e6db55;  border-width: 1px; border-style: solid; width :auto; height:auto;">
    </div><br /><br />

     </form>
    </div>

	<?php }

	public function evs_register_scripts() {
	   wp_register_script( 'evs2', ''.evs_PLUGIN_URL.'js/evs2.js' );
	   wp_register_style( 'evs2',  ''.evs_PLUGIN_URL.'css/evs2.css' );
       wp_register_script( 'evs1', ''.evs_PLUGIN_URL.'js/evs1.js');
	   wp_register_style( 'evs1',  ''.evs_PLUGIN_URL.'css/evs1.css' );

	}






	 public function evs_register_settings() {
	   register_setting('evs_settings_group','evs_settings');
	 }




}


$evs_admin_settings_class= new evs_admin_settings_class();
?>
