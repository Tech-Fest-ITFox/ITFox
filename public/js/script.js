$(function(){
	
	$(" .side-bar-trigger ").on("click", function() {
		$(" .side-bar, .top-section ").toggleClass("minimized");
		$(" .trig-icon ").hasClass("menu-3") ?
			$(this).children(" .trig-icon ").stop(true, true)
			.animateRotate(180, 500, "easeOutBack")
			.removeClass("menu-3")
			.addClass("W12")
			:
			$(this).children(" .trig-icon ").stop(true, true)
			.animateRotate(180, 500, "easeOutBack")
			.removeClass("W12")
			.addClass("menu-3");
		$(this).hasClass("full-height") ?
			$(this).removeClass("full-height")
			:
			$(this).delay(501).queue(function(){
			    $(this).addClass("full-height").dequeue();
			});
	});

	$(" .categories li a ").hover(function() {
		$(this).children(" .catg-icon ").stop(true, true).switchClass("", "icon-hover", 500, "easeOutBack");
		$(this).children(" .catg-title ").stop(true, true).switchClass("", "catg-title-hover", 500, "easeOutBack");
	}, function() {
		$(this).children(" .catg-icon ").stop(true, true).switchClass("icon-hover", "", 500, "easeOutBack");
		$(this).children(" .catg-title ").stop(true, true).switchClass("catg-title-hover", "", 200);
	});
	$(" .categories.min li a ").hover(function() {
		$(this).stop(true, true).switchClass("", "catg-a-hover", 400, "easeOutBack");
	}, function() {
		$(this).stop(true, true).switchClass("catg-a-hover", "", 400, "easeOutBack");
	});

	$('.user-info').materialripple();
	$('.user-info').on("click", function() {
		$(" .ripple-wrapper ").show();

		$(" .user-section ").stop(true, true).toggleClass("active-panel", 500, "swing", function() {
			$(" .user-section ").toggleClass("gray-bckg");
			$(" .ripple-wrapper ").hide();
			$(" .user-panel ").stop(true, true).toggleClass("active", 500, "swing");
		});
		$(' .user-name .flaticon.stroke ').toggleClass("down-1 up-1");
		$(" .ripple-wrapper ").delay(600).toggleClass( "light", 200);
			$(" .user-panel ").delay(600).toggleClass("active", 500, "swing");
		$(" .notification-trigger ").toggleClass( "white-bell" );
	});

	$(" .dialog.moveable ").draggable({
		handle: ".dialog-title"
	});
	$(" [data-dialog] ").on("click", function() {
		var dialog = $(" .dialog" );
		dialog.css('display', 'block');
		dialog.animate({
			top: "100",
			opacity: "1"
		}, 300);
		$(" .dialogs-holder ").fadeIn(300);
	});
	$(".x-1").on("click", function() {
		var dialog = $(".dialog");
		dialog.animate({
			top: "0",
			opacity: "0"
		}, 300, function() {
			dialog.css('display', 'none');
		});
		$(" .dialogs-holder ").fadeOut(300);
	});


	$("body").on("focusin", " .input ", function() {
		var plw = $(this).siblings(" .placeholder ").width() + 10;
		$(this).siblings(" .placeholder ").css("width", plw).animate({
			left: (480 - plw)
		}, 400, "easeOutBack");
	});
	$("body").on("focusout", " .input ", function() {
		if( !$(this).val() ) {
			var plw = $(this).siblings(" .placeholder ").width() - 9;
			$(this).siblings(" .placeholder ").css("width", plw).animate({
				left: 0
			}, 400, "easeOutBack");
		}
	});

	$(document).keydown(function(e) {
		if (e.keyCode == 27) {
			$(" .x-1 ").trigger("click");
		}   
	});







	$.fn.animateRotate = function(angle, duration, easing, complete) {
	  var args = $.speed(duration, easing, complete);
	  var step = args.step;
	  return this.each(function(i, e) {
	    args.complete = $.proxy(args.complete, e);
	    args.step = function(now) {
	      $.style(e, 'transform', 'rotate(' + now + 'deg)');
	      if (step) return step.apply(e, arguments);
	    };

	    $({deg: 0}).animate({deg: angle}, args);
	  });
	};

});