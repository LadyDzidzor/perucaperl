(function($){
	"use strict";
	/* ---------------------------------------------------------------------- */
	/*	works carousel
	/* ---------------------------------------------------------------------- */

	
	function Resize() {
		$(window).trigger('resize');
	}
	$(window).on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction('frontend/element_ready/Statum-Global-Widgets-Statistic.default', function(){
				
			/*-------------------------------------------------*/
			/* =  count increment
			/*-------------------------------------------------*/

			$('.statistic-post').appear(function() {
				$('.timer').countTo({
					speed: 4000,
					refreshInterval: 60,
					formatter: function (value, options) {
						return value.toFixed(options.decimals);
					}
				});
			});
			
		});
		
		elementorFrontend.hooks.addAction('frontend/element_ready/Statum-Global-Widgets-Testimonials.default', function(){
				
			/*-------------------------------------------------*/
			/* =  OWL carousell
			/*-------------------------------------------------*/

			var owlWrap = $('.owl-wrapper');

			if (owlWrap.length > 0) {

				if (jQuery().owlCarousel) {
					owlWrap.each(function(){

						var carousel= $(this).find('.owl-carousel'),
							dataNum = $(this).find('.owl-carousel').attr('data-num'),
							dataNum2,
							dataNum3;

						if ( dataNum == 1 ) {
							dataNum2 = 1;
							dataNum3 = 1;
						} else if ( dataNum == 2 ) {
							dataNum2 = 2;
							dataNum3 = dataNum - 1;
						} else {
							dataNum2 = dataNum - 1;
							dataNum3 = dataNum - 2;
						}

						carousel.owlCarousel({
							autoPlay: 10000,
							navigation : true,
							items : dataNum,
							itemsDesktop : [1199,dataNum2],
							itemsDesktopSmall : [991,dataNum3],
							itemsTablet : [768, dataNum3],
						});

					});
				}
			}
			
		});
		
		elementorFrontend.hooks.addAction('frontend/element_ready/Statum-Global-Widgets-Blog-Carousel.default', function(){
				
			/*-------------------------------------------------*/
			/* =  OWL carousell
			/*-------------------------------------------------*/

			var owlWrap = $('.owl-wrapper');

			if (owlWrap.length > 0) {

				if (jQuery().owlCarousel) {
					owlWrap.each(function(){

						var carousel= $(this).find('.owl-carousel'),
							dataNum = $(this).find('.owl-carousel').attr('data-num'),
							dataNum2,
							dataNum3;

						if ( dataNum == 1 ) {
							dataNum2 = 1;
							dataNum3 = 1;
						} else if ( dataNum == 2 ) {
							dataNum2 = 2;
							dataNum3 = dataNum - 1;
						} else {
							dataNum2 = dataNum - 1;
							dataNum3 = dataNum - 2;
						}

						carousel.owlCarousel({
							autoPlay: 10000,
							navigation : true,
							items : dataNum,
							itemsDesktop : [1199,dataNum2],
							itemsDesktopSmall : [991,dataNum3],
							itemsTablet : [768, dataNum3],
						});

					});
				}
			}
			
		});
		

		elementorFrontend.hooks.addAction('frontend/element_ready/Statum-Global-Widgets-Gmap.default', function(){
			if ($("#map").length){
				/* ---------------------------------------------------------------------- */
				/*	Contact Map
				/* ---------------------------------------------------------------------- */
				var map_latitude = Number($('#map').attr('data-latitude'));
				var map_longitude = Number($('#map').attr('data-longitude'));
				var map_zoom = parseInt($('#map').attr('data-zoom'));
				var map_marker = $('#map').attr('data-marker');

			 	
					var fenway = [map_longitude,map_latitude]; //Change a map coordinate here!
					var markerPosition = [map_longitude,map_latitude]; //Change a map marker here!
					$('#map').gmap3({
							center: fenway,
							zoom: map_zoom,
							scrollwheel: false,
							mapTypeId : google.maps.MapTypeId.ROADMAP
						})
						.marker({
							position: markerPosition,
							icon: map_marker
					});
				
			}
    		
    	});

		elementorFrontend.hooks.addAction('frontend/element_ready/Statum-Global-Widgets-Portfolio.default', function(){
				
			/*-------------------------------------------------*/
			/* =  portfolio isotope
			/*-------------------------------------------------*/

			var winDow = $(window);
				// Needed variables
				var $container=$('.iso-call');
				var $filter=$('.filter');

				try{
					$container.imagesLoaded( function(){
						$container.trigger('resize');
						$container.isotope({
							filter:'*',
							layoutMode:'masonry',
							animationOptions:{
								duration:750,
								easing:'linear'
							}
						});

						setTimeout(Resize, 1500);
					});
				} catch(err) {
				}

				winDow.on('resize', function(){
					var selector = $filter.find('a.active').attr('data-filter');

					try {
						$container.isotope({ 
							filter	: selector,
							animationOptions: {
								duration: 750,
								easing	: 'linear',
								queue	: false,
							}
						});
					} catch(err) {
					}
					return false;
				});
				try {
				// Isotope Filter 
				$filter.find('a').on('click', function(){
					var selector = $(this).attr('data-filter');

					try {
						$container.isotope({ 
							filter	: selector,
							animationOptions: {
								duration: 750,
								easing	: 'linear',
								queue	: false,
							}
						});
					} catch(err) {

					}
					return false;
				});
				
				} catch(err) {
				}

			var filterItemA	= $('.filter li a');

				filterItemA.on('click', function(){
					var $this = $(this);
					if ( !$this.hasClass('active')) {
						filterItemA.removeClass('active');
						$this.addClass('active');
					}
				});
			
		});

		

	});

})(jQuery);