<?php
/*
**   Custom Modifcations in CSS depending on user settings.
*/

function adviso_custom_css_mods() {

    $custom_css = "";

	// Typography
	
		//General
	$custom_css .= ".title-font, h1, h2, .section-title, .woocommerce ul.products li.product h3 { font-family: " . esc_html( get_theme_mod('adviso_title_font1','Arvo') ) . "; }";
	
	$custom_css .= "body { font-family: ".esc_html( get_theme_mod('adviso_body_font1','Ubuntu') )." !important; }";
	
		// Navigation
		
	$custom_css .= "#site-navigation { font-family: '" . esc_html( get_theme_mod( 'adviso_nav_title_font', 'Arvo' ) ) . "'; }";
			
	$custom_css .= "#site-navigation a {
				font-size: " . esc_html( get_theme_mod( 'adviso_nav_title_font_size', '14' ) ) . "px; 
				font-weight: " . esc_html( get_theme_mod( 'adviso_nav_title_font_weight', '400' ) ) . "; }";
				
		// Site Title
	$custom_css .= ".site-title { font-family: '" . esc_html( get_theme_mod( 'adviso_site_title_font', 'Arvo' ) ) . "'; }";
			
	$custom_css .= ".site-title a {
				font-size: " . esc_html( get_theme_mod( 'adviso_site_title_font_size', '36' ) ) . "px; 
				font-weight: " . esc_html( get_theme_mod( 'adviso_site_title_font_weight', '400' ) ) . "; }
				";
				
		// Blog Page
	$custom_css .= "body.blog .section-title, body.blog h1:not(.site-title), body.blog h2, body.blog h3:not(.widget-title) {
				font-family: '" . esc_html( get_theme_mod( 'adviso_blog_title_font1', 'Arvo' ) ) . "';
				font-size: " . esc_html( get_theme_mod( 'adviso_blog_title_font_size', '24' ) ) . "px;
				font-weight: " . esc_html( get_theme_mod( 'adviso_blog_title_font_weight', '400' ) ) . "; }";
			
	
	$custom_css .= "body.blog p, body.blog .entry-excerpt {
				font-family: '" . esc_html( get_theme_mod( 'adviso_blog_body_font', 'Ubuntu' ) ) . "';
				font-size: " . esc_html( get_theme_mod( 'adviso_blog_body_font_size', '16' ) ) . "px;
				font-weight: " . esc_html( get_theme_mod( 'adviso_blog_body_font_weight', '400' ) ) . "; }";
				
	if ( get_theme_mod('adviso_blog_sidebar_layout', 'sidebarright') == 'sidebarleft' ) {
		$custom_css .= "body.blog #primary {float: right;}";
	}
	  

    if( !display_header_text() ):
        $custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
    endif;

    if ( get_header_textcolor() ):
        $custom_css .= "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
    endif;

    if ( get_theme_mod('adviso_header_desccolor') ) :
        $custom_css .= "#masthead h2.site-description { color: ".esc_html( get_theme_mod('adviso_header_desccolor') ).";}";
    endif;
    
    $custom_css	.=	"body.home #masthead #site-navigation ul.menu > li:not(.current-menu-item):not(.current_page_item):not(.current_page_ancestor) > a, body.home #masthead #adviso-search #search-icon,body.home #masthead #contact-info, body.home #masthead #top-cart, body.home #masthead #top-cart a { color: " . esc_html( get_theme_mod('adviso_top_bar_color', '#000000') ) . ";}";     

	
    wp_add_inline_style( 'adviso-main-theme-style', wp_strip_all_tags($custom_css) );



}
add_action('wp_enqueue_scripts', 'adviso_custom_css_mods');
