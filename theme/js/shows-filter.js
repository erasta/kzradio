jQuery(document).ready(function() {
	jQuery('#shows-filter').submit(function(e){
		console.log(kzradio.ajaxurl);
		var jform = jQuery('#shows-filter');
		
		var data = {
			action : 'shows_filter_function',
			//email : email,
		};
		jQuery.post(ajaxurl, data, function(response) {
			console.log('Got this from the server: ' + response);
		});
		
		return false;
	});
});