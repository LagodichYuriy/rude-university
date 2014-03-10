function rude_animation(selector, data)
{
	$(selector).fadeOut('slow', function() {
		$(selector).html(data)
	}).fadeIn('slow');
}
