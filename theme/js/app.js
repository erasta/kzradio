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
	})
	
});