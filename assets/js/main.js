jQuery(document).ready(function ($) {
	// initialise plugins
	$("#tabs").tabs();

	$('ul.columns li:last-child').addClass('last');

	//portfolio style
	$('.data').hover(
		function(){
			link = $(this).find('.con');
			link.animate({top: '50%', opacity: '1'},200);
		},
		function(){
			link.animate({top: '-50px', opacity: '0'},200);
		}
	);

	// hide #back-top first
	$("#back-top").hide();

	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	//function to stay menu top when scroll down
	var menu = $('#main-nav'),
	pos = menu.offset();

	$(window).scroll(function(){
		if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
			menu.fadeOut('fast', function(){
				$(this).removeClass('default').addClass('fixed').fadeIn('fast');
			});
		} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
			menu.fadeOut('fast', function(){
				$(this).removeClass('fixed').addClass('default').fadeIn('fast');
			});
		}
	});


	//Cookie Handling Functions
	function bakeCookie(name, value) {
		var expires = new Date();
		expires.setTime(expires.getTime() + (15552000000));
		if(value === ''){//set cookie, or if value is blank, set it to be removed
			document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
		} else {
			document.cookie = name + "=" + value + "; expires=" + expires.toGMTString() + "; path=/";
		}
	}
	function eatCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		var cookieValue = "";
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1);
			if (c.indexOf(nameEQ) === 0) {
				cookieValue = c.substring(nameEQ.length);
				break;
			}
		}
		return cookieValue;
	}
	$('#continue-to-guestbook').click(function(){
		bakeCookie('name', $('#guestbook-name').val());
		bakeCookie('email', $('#guestbook-email').val());
		window.location = '/guestbook';
	});
	console.log(window.location.pathname);
	if(window.location.pathname == '/guestbook/'){
		$('#comment_name').val(eatCookie('name'));
		$('#comment_email').val(eatCookie('email'));
	}

});