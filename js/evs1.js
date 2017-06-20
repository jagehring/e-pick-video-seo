jQuery(document).ready(function() {


jQuery('#evsgeneratesitemap').click(function() {
       document.getElementById('evsgenerate').style.display = "block";
	   document.getElementById('evsgeneratesitemap').value= "Generating Sitemap";



        jQuery.ajax({
            data: {action: "update_evssitemap" },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) {
			 document.getElementById('evssitemapgeneratestatus').innerHTML = response;
	         document.getElementById('evsgenerate').style.display = "none";
			 document.getElementById('evssitemapgeneratestatus').style.display = "block";
			 document.getElementById('evsgeneratesitemap').value= "Re-generate sitemap";

			

			 }
        });
});






$('#evspingsitemap').click(function() {
       document.getElementById('evsping').style.display = "block";
	   document.getElementById('evspingsitemap').value= "Generating Sitemap";
	   console.log('Generating Sitemap');


        $.ajax({
            data: {action: "ping_videositemap" },
            type: 'POST',
            url: ajaxurl,
            success: function( response ) {
			 document.getElementById('evssitemapgeneratestatus').innerHTML = response;
	         document.getElementById('evsping').style.display = "none";
			 document.getElementById('evssitemapgeneratestatus').style.display = "block";
			 document.getElementById('evspingsitemap').value= "Notified";

			console.log('your sitemap has been  successfully notified ' + response);
               setTimeout(function(){
             location.reload();
             }, 5000);
			}
        });
});


});
