jQuery(document).ready( function() {
    //Mobile Menu
    jQuery('.panel_hide_button').hide();
    jQuery('.menu-link').bigSlide({
        menu: '#menu',
        side: 'right',
        easyClose: true,
        menuWidth: '25em',
        beforeOpen: function() {jQuery('.panel_hide_button').fadeIn()},
        beforeClose: function() {jQuery('.panel_hide_button').fadeOut()},
    });
    
    var parentElement = jQuery('.panel li.menu-item-has-children'),
    	dropdown	=	jQuery('.panel li.menu-item-has-children span');
    
    parentElement.children('ul').hide();
    dropdown.on('click', function(e) {
	    jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
	    e.stopPropagation();
    });

	jQuery(".owl-carousel").each(function(){
	    jQuery(this).owlCarousel({
	       items: 4,
	        margin: 1,
	        loop: true,
	        dots: true,
	        nav: true,
	        navClass: ['prev mdl-button mdl-js-button mdl-button--fab','next mdl-button mdl-js-button mdl-button--fab'],
	        navText: ["<button class='mdl-button mdl-js-button mdl-button--fab mdl-button--primary'><i class='fa fa-chevron-left'></i></button>", "<button class='mdl-button mdl-js-button mdl-button--fab mdl-button--primary'><i class='fa fa-chevron-right'></i></button>"],
	        responsive: {
	            300 : {
	                items : 1,
	            },
	            // breakpoint from 768 up
	            768 : {
	                items: 2,
	            },
	            991 : {
	                items: 4,
	            }
	        }
	    });
	});

	jQuery('#masthead #search-icon').each( function() {
		jQuery(this).on( 'click', function() {
			jQuery('#jumbosearch').fadeIn();
		});
	});
	
	jQuery('#jumbosearch .closeicon').click(function() {
		jQuery('#jumbosearch').fadeOut(function(){
			jQuery('.masthead-container').animate({
			'top': '0px'
			},300 );
		});
	});
	
});


