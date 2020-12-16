(function($){
	"use strict";

	$(document).ready(function($) {
		/* ---------------------------------------------------------------------- */
		/*	Load more posts from container
		/* ---------------------------------------------------------------------- */

		$(document).on( 'click', '.load-post-container1', function( event ) {
			
				var cat_id = $(this).attr('data-cat');
				var order = parseInt($(this).attr('data-load'));
				var found = parseInt($(this).attr('data-found'));
				var max = parseInt($(this).attr('data-max'));
				var page = parseInt($(this).attr('data-page'));
				var thumb = $(this).attr('data-thumb');
				
				if(page<=max){
					

					event.preventDefault();
					$.ajax({
						url: ajaxurl.ajaxurl,
						method: "POST",
						data: {
							action: 'statum_load_portfolio_grid',
							cat: cat_id,
							order: order,
							page: page,
							thumb: thumb,
							
						},
						success: function( response ){
							$('.load-post-container1').addClass('loading');
							page = page+1;
							$('.load-post-container1').attr( 'data-page', page )
							if( response != "" ){
								var $container = $('.portfolio-box.iso-call');
								var $elems;
									$elems = $(response).appendTo($container);
								$container.imagesLoaded( function(){
									$container.trigger('resize');
									$container.isotope( 'appended', $elems );
								});
								setTimeout(function(){
									$('.load-post-container1').removeClass('loading');
								}, 200);

							}
							else{
								
							}
							
						}
					});


				}else{
					event.preventDefault();
					$(this).html('No post to load');
				}
					
			});
	});
})(jQuery);