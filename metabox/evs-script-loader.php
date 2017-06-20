<?php wp_enqueue_media(); ?>
<script type="text/javascript">

someText = '<?php if (isset($thumbdesc3)) {echo $thumbdesc3;} elseif (isset($evsdesc5)) {echo $evsdesc5;} ?>';
someTitle = '<?php if (isset($thumbtitle2)) {echo $thumbtitle2;} elseif (isset($evstitle3)) {echo $evstitle3;}  ?>';
jQuery(document).ready(function($) {
var custom_uploader;
 
 
    $('.evs-upload_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.evs_thumbloc').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });

			


    

 
	 $('#clear_video_button').click(function() {
   document.getElementById('thumbloc').value = "";
   document.getElementById('thumbtitle').value = "";
   document.getElementById('thumbdesc').value = "";
   document.getElementById('thumbdate').value = "";
   document.getElementById('thumbplayer').value = "";
   document.getElementById('thumbduration').value = "";
   document.getElementById('family').value = "";
   document.getElementById('thumbauthor').value = "";
   document.getElementById('thumbauthorname').value = "";
   document.getElementById('thumbpubdate').value = "";
   document.getElementById('thumbfileloc').value = "";
   });
   
   
    $('#reupdate_video_button').click(function() {
  document.getElementById('thumbloc').value = "<?php if ($thumbloc) {echo $thumbloc;} elseif ($evsthumburl) {echo $evsthumburl;}  ?>";
            document.getElementById('thumbtitle').value = someTitle;
            document.getElementById('thumbdesc').value = someText;
            document.getElementById('thumbdate').value = "<?php if ($thumbdate) {echo $thumbdate;} elseif ($evsrating) {echo $evsrating;}  ?>";
            document.getElementById('thumbplayer').value = "<?php if ($thumbplayer) {echo $thumbplayer;} elseif ($evsvideurl) {echo $evsvideurl;} ?>";
            document.getElementById('thumbduration').value = "<?php if ($thumbduration) {echo $thumbduration;} elseif ($evslength) {echo $evslength;}  ?>";
            document.getElementById('family').value = "<?php echo $familycheckedstatus; ?>";
            document.getElementById('thumbauthor').value = "<?php if ($evsauthor !='') {echo $evsauthor;} ?>";
            document.getElementById('thumbauthorname').value = "<?php if ($evsauthorname !='') {echo $evsauthorname;} ?>";
            document.getElementById('thumbpubdate').value = "<?php if ($evspubdate !='') {echo $evspubdate;} ?>";
            document.getElementById('thumbfileloc').value = "<?php if ($thumbfileloc) {echo $thumbfileloc;} elseif ($evsfileloc) {echo $evsfileloc;}?>";
   });
   
   
   

   
   
   
   
   
    
  $('#update_video_fields').click(function() {
	   document.getElementById('evsloading').style.display = "block";
	   document.getElementById('update_video_fields').value= "saving all fields";
	  console.log('Submit Function');
	  var postID = <?php echo get_the_id(); ?>;
	  //for thumbloc
	    var fieldValue = [], fieldName = [];
		$("input#thumbloc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbloc";
        });

        $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video thumbnail url has been updated  ' + response); }
        });
		
	  //for thumbtitle
	  var fieldValue = [], fieldName = [];
        $("input#thumbtitle").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbtitle";
        });

       
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	       document.getElementById('evsloading').style.display = "none";
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video title has been updated  ' + response); }
        }); 
		
		
		//for thumbdesc
		  var fieldValue = [], fieldName = [];
        $("textarea#thumbdesc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbdesc";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	       document.getElementById('evsloading').style.display = "none";
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video description has been updated  ' + response); }
        });
		
		//for thumbdate
		  var fieldValue = [], fieldName = [];
        $("input#thumbdate").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbdate";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	       document.getElementById('evsloading').style.display = "none";
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video rating has been updated  ' + response); }
        });
		
		//for thumbplayer
		  var fieldValue = [], fieldName = [];
        $("input#thumbplayer").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbplayer";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
		     document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video player url has been updated  ' + response); }
        });
		
		//for thumbduration
		  var fieldValue = [], fieldName = [];
        $("input#thumbduration").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbduration";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video duration has been updated  ' + response); }
        });
		

		
		
				//for thumbauthor
		  var fieldValue = [], fieldName = [];
        $("input#thumbauthor").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbauthor";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video author has been updated  ' + response); }
        });
		
		//for thumbauthorname
		  var fieldValue = [], fieldName = [];
        $("input#thumbauthorname").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbauthorname";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video author name  has been updated  ' + response); }
        });
		
		//for thumbpubdate
		  var fieldValue = [], fieldName = [];
        $("input#thumbpubdate").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbpubdate";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video publication date  has been updated  ' + response); }
        });
		
			//for thumbfileloc
		  var fieldValue = [], fieldName = [];
        $("input#thumbfileloc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbfileloc";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
	         document.getElementById('evsloading').style.display = "none";
			 document.getElementById('evsupdatestatus').style.display = "block";
			 document.getElementById('update_video_fields').value= "reupdate all fields";
			 console.log('video file location has been updated ' + response); }
        });
		
	   return false;
    }); // end of document.ready
	
		
		
	$('#add_to_sitemap').click(function() {
	
	   document.getElementById('evsloading2').style.display = "block";
	  console.log('Submit Function');
	  var postID = <?php echo get_the_id(); ?>;
	  //for thumbloc
	    var fieldValue = [], fieldName = [];
		$("input#thumbloc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbloc";
        });

        $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video thumbnail url has been updated  ' + response); }
        });
		
	  //for thumbtitle
	  var fieldValue = [], fieldName = [];
        $("input#thumbtitle").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbtitle";
        });

       
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video title has been updated  ' + response); }
        }); 
		
		
		//for thumbdesc
		  var fieldValue = [], fieldName = [];
        $("textarea#thumbdesc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbdesc";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video description has been updated  ' + response); }
        });
		
		//for thumbdate
		  var fieldValue = [], fieldName = [];
        $("input#thumbdate").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbdate";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
		   document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video rating has been updated  ' + response); }
        });
		
		//for thumbplayer
		  var fieldValue = [], fieldName = [];
        $("input#thumbplayer").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbplayer";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
		     document.getElementById('evsupdatestatus').style.display = "block";
			console.log('video player url has been updated  ' + response); }
        });
		
		//for thumbduration
		  var fieldValue = [], fieldName = [];
        $("input#thumbduration").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbduration";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video duration has been updated  ' + response); }
        });
		

		
		
				//for thumbauthor
		  var fieldValue = [], fieldName = [];
        $("input#thumbauthor").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbauthor";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video author has been updated  ' + response); }
        });
		
		//for thumbauthorname
		  var fieldValue = [], fieldName = [];
        $("input#thumbauthorname").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbauthorname";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video author name  has been updated  ' + response); }
        });
		
		//for thumbpubdate
		  var fieldValue = [], fieldName = [];
        $("input#thumbpubdate").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbpubdate";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video publication date  has been updated  ' + response); }
        });
		
			//for thumbfileloc
		  var fieldValue = [], fieldName = [];
        $("input#thumbfileloc").each(function() {
        $thisItem = $(this);
        fieldValue = $thisItem.val();
		fieldName = "thumbfileloc";
        });

        
		
         $.ajax({
            data: {action: "update_meta", post_id: postID, post_meta: fieldValue, field_name: fieldName },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus').innerHTML = response;
			 document.getElementById('evsupdatestatus').style.display = "block";
			 console.log('video file location has been updated ' + response); }
        });
	
	
	   document.getElementById('evsloading2').style.display = "block";
	   document.getElementById('add_to_sitemap').value= "updating sitemap";
	   console.log('updating sitemap');
	  

        $.ajax({
            data: {action: "update_evssitemap" },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) { 
			 document.getElementById('evsupdatestatus2').innerHTML = response;
	         document.getElementById('evsloading2').style.display = "none";
			 document.getElementById('evsupdatestatus2').style.display = "block";
			 document.getElementById('add_to_sitemap').value= "reupdate sitemap";
			console.log('video thumbnail url has been updated  ' + response); }
        });
		
			
		
	   return false;
    }); // end of document.ready


   
   $(document).ready(function(){
    $('#evsdisable').change(function(){
        if(this.checked) {
		    
            $('#evsvideobox').hide('slow');
			document.getElementById('thumbloc').value = "";
            document.getElementById('thumbtitle').value = "";
            document.getElementById('thumbdesc').value = "";
            document.getElementById('thumbdate').value = "";
            document.getElementById('thumbplayer').value = "";
            document.getElementById('thumbduration').value = "";
            document.getElementById('family').value = "";
            document.getElementById('thumbauthor').value = "";
            document.getElementById('thumbauthorname').value = "";
            document.getElementById('thumbpubdate').value = "";
            document.getElementById('thumbfileloc').value = "";
			 
		}	
			 
        else {
            $('#evsvideobox').show('slow');
			document.getElementById('thumbloc').value = "<?php if ($thumbloc) {echo $thumbloc;} elseif ($evsthumburl) {echo $evsthumburl;}  ?>";
            document.getElementById('thumbtitle').value = someTitle;
            document.getElementById('thumbdesc').value = someText;
            document.getElementById('thumbdate').value = "<?php if ($thumbdate) {echo $thumbdate;} elseif ($evsrating) {echo $evsrating;}  ?>";
            document.getElementById('thumbplayer').value = "<?php if ($thumbplayer) {echo $thumbplayer;} elseif ($evsvideurl) {echo $evsvideurl;} ?>";
            document.getElementById('thumbduration').value = "<?php if ($thumbduration) {echo $thumbduration;} elseif ($evslength) {echo $evslength;}  ?>";
            document.getElementById('family').value = "<?php echo $familycheckedstatus; ?>";
            document.getElementById('thumbauthor').value = "<?php if ($evsauthor !='') {echo $evsauthor;} ?>";
            document.getElementById('thumbauthorname').value = "<?php if ($evsauthorname !='') {echo $evsauthorname;} ?>";
            document.getElementById('thumbpubdate').value = "<?php if ($evspubdate !='') {echo $evspubdate;} ?>";
            document.getElementById('thumbfileloc').value = "<?php if ($thumbfileloc) {echo $thumbfileloc;} elseif ($evsfileloc) {echo $evsfileloc;}?>";
			}

    });
});
   
  
   
  


  
});

 </script>