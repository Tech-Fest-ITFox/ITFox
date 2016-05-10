/* jQuery MaterialRipple Plugin */
/* 2014 Dominik Biedebach */

$.fn.materialripple = function(options) {
	var defaults = {
		rippleClass: 'ripple-wrapper'
	}
	$.extend(defaults, options);

	// add Ripple-Wrapper to all Elements
	$(this).append('<span class="'+defaults.rippleClass+'"></span>');
	
	// Let it ripple on click
	$(this).on('mousedown', function(e){
		$(this).find('.'+defaults.rippleClass).removeClass('animated');
		// get Mouse Position
		var mouseX = e.clientX;
		var mouseY = e.clientY;

		// for each ripple element, set sizes
		elementWidth = $(this).outerWidth();
		elementHeight = $(this).outerHeight();
		d = Math.max(elementWidth, elementHeight);
		$(this).find('.'+defaults.rippleClass).css({'width': d, 'height': d});

		var rippleX = e.clientX - $(this).offset().left - d/2;
		var rippleY = e.clientY - $(this).offset().top - d/2;

		// Position the Ripple Element
		$(this).find('.'+defaults.rippleClass).css('top', rippleY+'px').css('left', rippleX+'px').addClass('animated');


	});
}