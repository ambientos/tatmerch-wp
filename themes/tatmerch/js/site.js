(function($){
	if (!$('body').hasClass('client-cabinet')) {
		$('.hamburgerMenu').live('click', function () {
			if ($(this).hasClass('open')) {
				$(this).removeClass('open');
				$('.mobile_menu').hide();
				$('.client-cabinet .right-area').show();
			}
			else {
				$(this).addClass('open');
				$('.mobile_menu').show();
				$('.client-cabinet .right-area').hide();
			}
		});

		$('.mobile_menu li').live('click', function () {
			$('.hamburgerMenu').click();
		});
	}

	if ($(window).width() > 992) {
		var toTopHTML = '<div class="to-top" style="display:none;"></div>';

		$('footer').after(toTopHTML);

		window.onscroll = function () {
			var scrolled = window.pageYOffset || document.documentElement.scrollTop;
			if (scrolled > 20) {
				$('.to-top').fadeIn('slow');
			} else {
				$('.to-top').fadeOut('slow');
			}
		}

		$('.to-top').click(function () {
			var body = $("html, body");
			body.stop().animate({ scrollTop: 0 }, 1000);
		});
	}
})(jQuery)
