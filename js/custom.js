;(function($) {
 
	"use strict"; 
	
	$(document).ready(function () {

		// Testimonial Carousel (Slick) 		
		$('.testimonial-carousel').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: false,
			dots: false,
			focusOnSelect: true,
			easing: 'linear',
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true
					}
				}
			]
		});

		// Team Memeber Carousel (Slick) 		
		$('.team-carousel').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 3000,
			arrows: false,
			dots: false,
			focusOnSelect: true,
			easing: 'linear',
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true
					}
				}
			]
		});

	});

})(jQuery);