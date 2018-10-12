(function(){

	'use strict';

	ACMESTORE.homeslider.initCarousel = function(){
		$('.hero-slider').slick({
			slidesToshow:1,
			autoplay:true,
			arrows: false,
			dots: false,
			fade: true,
			autoplayHoverPause: true,
			slidesToScroll: 1
		});
	};
})();