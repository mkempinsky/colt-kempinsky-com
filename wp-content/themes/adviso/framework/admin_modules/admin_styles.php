<?php
/**
* Enqueue Scripts for Admin
*/
function adviso_custom_wp_admin_style() {
wp_enqueue_style( 'adviso-admin_css', get_template_directory_uri() . '/assets/theme-styles/css/admin.css', array(), true );
}
add_action( 'customize_controls_print_styles', 'adviso_custom_wp_admin_style' );