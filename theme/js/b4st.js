/**!
 * b4st JS
 */
(function ($) {
	'use strict';
	$(document).ready(function() {
		// Comments
		//$('.commentlist li').addClass('card');
		//$('.comment-reply-link').addClass('btn btn-secondary');

		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');

		// Pagination fix for ellipsis
		$('.pagination .dots').addClass('page-link').parent().addClass('disabled');

		// You can put your own code in here
		if( $('#wrapper-schedule .schedule-table .day-column').length ) {
			$('#wrapper-schedule .schedule-table').height( $('#wrapper-schedule .schedule-table .day-column.active-day').height() );
		}
		
		/*jQuery(".my_button").click(function(){

jQuery.get(ajaxurl,{'action': 'sayhello'}, 
function (msg) { alert(msg);});

});*/
		/*$('#shows-filter').submit(function(e){
			//console.log(kzradio.ajaxurl);
			var jform = $('#shows-filter');
			
			var data = {
				action : 'shows_filter_function',
				//email : email,
			};
			$.post(ajaxurl, data, function(response) {
				console.log('Got this from the server: ' + response);
			});
			
			return false;
		});*/
		
	});
}(jQuery));