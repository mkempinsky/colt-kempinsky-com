/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */


(function($) {
	
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	wp.customize( 'adviso_header_text', function( value ) {
		value.bind( function( to ) {
			$( '.header-text' ).text( to );
		} );
	} );
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#text-title-desc' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
				// Add class for different logo styles if title and description are hidden.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				
				$( '#text-title-desc' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '.site-branding a' ).css({
					color: to
				});
				// Add class for different logo styles if title and description are visible.
				$( 'body' ).removeClass( 'title-tagline-hidden' );
			}
		});
	});
	
	wp.customize( 'adviso_header_desccolor', function( value ) {
	    value.bind( function ( to ) {
		    jQuery('h2.site-description').css('color', to );
	    });
    });
    
    wp.customize( 'adviso_top_bar_color', function( value ) {
	    value.bind( function ( to ) {
		    jQuery('body.home ul.menu > li:not(.current-menu-item):not(.current_page_item):not(.current_page_ancestor) > a, body.home #adviso-search #search-icon, body.home #contact-info, #top-cart, #top-cart a').css('color', to );
	    });
    });
    
    wp.customize( 'adviso_social_1', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_2', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_3', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_4', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_5', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_6', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
		});
	});
	
	 wp.customize( 'adviso_social_7', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fa fa-fw fa-' + to;
			jQuery('#social-icons' ).find( 'i:eq(6)' ).attr( 'class', ClassNew );
		});
	});
	
	/*---- Sidebar Width ----*/
	
	wp.customize( 'adviso_sidebar_width', function( value ) {
		value.bind( function( to )  {
			var numWidth	=	(to / 12) * 100;
			jQuery('#secondary').css('width', numWidth + '%' );
			jQuery('#primary').css('width', 100 - numWidth + '%');
		});
	});
	
	/*---- Sidebar Align ----*/
	
	wp.customize( 'adviso_blog_sidebar_layout', function( value ) {
		value.bind( function( to ) {
			if ( to === 'sidebarleft') {
				jQuery('body.blog #primary').css('float', 'right');
			} else {
				jQuery('body.blog #primary').css('float', 'left');
			}
		});
	});
})(jQuery);