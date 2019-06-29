jQuery(document).ready(function( $ ) {
  //$('body').attr('id', 'page-top');
	$(window).scroll(function() {
		if ($('.navbar').offset().top > 50) {
			$('.navbar-fixed-top').addClass('top-nav-collapse');
		} else {
			$('.navbar-fixed-top').removeClass('top-nav-collapse');
		}
	});
	$(function() {
		$('a.page-scroll').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		}),
		$('body').scrollspy({
			target: '.navbar-fixed-top',
			offset: 51,
		}),
		$('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function () {
			$('.navbar-toggle:visible').click();
		}),
		$('#mainNav').affix({
			offset: {
				top: 100,
			}
		});
	}),
	window.sr = ScrollReveal(),
	sr.reveal('.btn-portfolio', {
		duration: 1000,
		delay: 500,
		scale: 0.3,
		distance: '0px',
		reset: true,
	}, 1200),
	sr.reveal('.sr-button', {
		duration: 600,
		delay: 200,
	}),
	sr.reveal('.social-effect', {
		duration: 800,
		scale: 0.3,
		distance: '0px',
		reset: true,
	}, 400),
	sr.reveal('.portfolio-box', {
		duration: 1000,
		scale: 0.5,
		distance: '10px',
		reset: true,
	}, 150),
	$(function (a) {
	a('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
      navigateByImgClick: true,
			preload: [0, 1],
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});
	}),
	$(window).scroll(function () {
		if ($(this).scrollTop() > 550) {
			$('.back-to-top').fadeIn()
		} else {
			$('.back-to-top').fadeOut()
		}
	});
	$('.back-to-top').click(function () {
		$('html, body').animate({
			scrollTop: '0px',
		}, 1000);
		return false
	});
}(jQuery));
