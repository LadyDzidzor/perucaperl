(function($){

	"use strict";

	var Brooklyn = {

		// Background Img
		bgImageStretch: function() {
			$(".background-bg").css('background-image', function () {
				var bg = ('url(' + $(this).data("image-src") + ')');
				return bg;
			});
		},

		// Responsive Menu Open and Close in Mobile
		toggleMobileMenu: function() {
			if ($(window).width() < 767) {
				"use strict";
				$('.menu-item-has-children>a').on('click', function(e) {
					event.preventDefault(); 
					event.stopPropagation(); 
					$(this).parent().siblings().removeClass('open');
					$(this).parent().toggleClass('open');
				});
			};
		},
		
		// Sidebar Menu Open
		menuOpen: function() {
			$('.nav-trigger').on('click', function(event) {
				event.preventDefault(); 
				event.stopPropagation();
				$('body').toggleClass('open');
			});
		},

		// Sidebar Menu Close
		menuClose: function() {
			$('.menu-close').on('click', function(event) {
				event.preventDefault(); 
				event.stopPropagation();
				$('body').removeClass('open');
			});			
		},

		/* Mobile menu */
		mobileMenu: function() {
			$( '.main-header' ).on( 'click', '.navbar-toggler', function( e ) {
				e.preventDefault();
				$( 'body' ).toggleClass( 'mobile-menu-active' );
			} );
			$( '.main-menu' ).on( 'click', 'li a', function( e ) {
				if ( $( 'body' ).hasClass( 'mobile-menu-active' ) ) {
					$( 'body' ).removeClass( 'mobile-menu-active' );
				}
			} );

			// Add dropdown arrow to <li> elements that contain sub-menus
			var hasChildMenu = $( '.main-menu' ).find('li:has(ul)');
			hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

			// Mobile sub-menus toggle action
			$( '.main-menu' ).on( 'click', '.subnav-toggle', function( e ) {
				e.preventDefault();
				$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
			} );
	
		},

		// Skip Links
		skipLink: function() {
			var isIe = /(trident|msie)/i.test( navigator.userAgent );

			if ( isIe && document.getElementById && window.addEventListener ) {
				window.addEventListener( 'hashchange', function() {
					var id = location.hash.substring( 1 ),
						element;

					if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
						return;
					}

					element = document.getElementById( id );

					if ( element ) {
						if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
							element.tabIndex = -1;
						}

						element.focus();
					}
				}, false );
			}		
		}



	};

	$(document).ready(function() {
		"use strict";
		Brooklyn.bgImageStretch();
		Brooklyn.toggleMobileMenu();
		Brooklyn.menuOpen();
		Brooklyn.menuClose();
		Brooklyn.skipLink();
		Brooklyn.mobileMenu();
	});


    $(document).scroll(function () {
        var $nav = $(".main-header");
        // $nav.addClass('fixed-top');
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });	

})(jQuery);