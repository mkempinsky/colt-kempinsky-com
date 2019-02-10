<?php
function adviso_custom_wp_admin_scripts() {

   wp_enqueue_script( 'adviso-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );

}
add_action( 'customize_preview_init', 'adviso_custom_wp_admin_scripts' );

// Enqueue our scripts and styles
function adviso_extend_customizer_js() {
	
	wp_enqueue_script( 'adviso-customize-control', get_template_directory_uri() . '/js/customize-controls.js', array(), '', true );
	
	wp_enqueue_script( 'adviso-extend-customizer', get_theme_file_uri( '/js/extend-customizer.js' ), array(), '1.0', true );
	
}
add_action( 'customize_controls_enqueue_scripts', 'adviso_extend_customizer_js', 1 );