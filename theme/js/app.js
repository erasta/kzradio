jQuery(window).load(function(){
	if(jQuery('#wrapper-home #shows-curr-and-next').length && jQuery(window).width() < 767){
		var headerHeight = jQuery('#header').height();
		var playerHeight = jQuery('.floating-bar > .inner').height();
		console.log('calc(100vh - ' + (headerHeight+playerHeight) + 'px)');
		jQuery('#wrapper-home #shows-curr-and-next').css({'height': 'calc(100vh - ' + (headerHeight+playerHeight) + 'px)'});
	}
});

jQuery(document).ready(function ($) {
	$('#shows-filter').submit(function(e){
		e.stopPropagation();
		e.preventDefault();
		var filter = $('#shows-filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('מחפש...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('חפש'); // changing the button label back
				var result = $(data).find('#response').html();
				//console.log( result + '****' );
				$('#response').html(result);
			}
		});
		return false;
	});
	$('#shows-filter').change(function() {
		$('button.search').addClass('cta');
	});
	$('input[type=reset]').click(function() {
		$('button.search').removeClass('cta');
		setTimeout(function() {
			$('#shows-filter').submit();
		}, 100);
	});

	if ($('.share').length) {
   		$(window).on('scroll', function () {
	        var top = $(window).scrollTop(),
	            divBottom = $('.share .buttons').offset().top + $('.share .buttons').outerHeight();
	        if (divBottom > top) {
	            setTimeout(function() {
   					$('.share .buttons a').addClass('animated bounce');
   					setTimeout(function () {
   						$('.share .buttons a').removeClass('animated bounce');
   					}, 2500);
   			}, 1500);
	        }
	    });
   	}

});