<header id="masthead" class="site-header">
	<div class="mobile-menu">
		<button id="search-icon">
        	<i class="fa fa-search"></i>
        </button>
        <?php get_template_part('modules/navigation/menu','mobile'); ?>
    </div>
    <div id="top-bar">
        <div class="site-branding ">
            <?php if ( has_custom_logo() ) : ?>
                <div class="adviso-logo">
                    <div id="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div><!-- .site-branding -->

        <div class="menu-wrapper ">
            <!-- Menu -->
            <?php get_template_part('modules/navigation/menu', 'primary'); ?>
        </div>
        <div id="adviso-search">
            <button id="search-icon">
            	<i class="fa fa-search"></i>
            </button>
        </div>
        
        <?php get_template_part('modules/header/jumbosearch'); ?>
        
        
        <?php if (class_exists('woocommerce') && get_theme_mod('adviso_top_cart_toggle')) : ?>
            <div id="top-cart">
                <div class="top-cart-icon">


                    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'adviso'); ?>">
	                        <div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'adviso'), WC()->cart->cart_contents_count);?></div>
	                        <div class="total"> <?php echo WC()->cart->get_cart_total(); ?>
	                        </div>
	                    </a>

                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
   
	    <div class="header-text title-font container">
		     <?php if ( ( get_theme_mod( 'adviso_header_text' ) != '' ) && is_front_page() ) { ?>
		    <?php
			    echo esc_html( get_theme_mod('adviso_header_text') );
		    ?>
			<?php } ?>
	    </div>
    
    <?php if ( get_theme_mod('adviso_header_cta_enable') && is_front_page() ) { ?>
	    <div class="header-cta">
		    <a href="<?php echo esc_url(get_theme_mod('adviso_header_cta_url', '')); ?>"><?php echo esc_html( get_theme_mod( 'adviso_header_cta', '' ) ); ?></a>
	    </div>
    <?php } ?>
    
    <div id="social-wrapper" class="container">
	    
	    <div id="social-icons">
	        <?php get_template_part('modules/social/social', 'fa'); ?>
	    </div>
	    
	    <?php get_template_part('modules/header/contact', 'info'); ?>
	    
    </div>
    
</header><!-- #masthead -->