<?php
/**
 * adviso functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adviso
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adviso_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adviso_content_width', 640 );
}
add_action( 'after_setup_theme', 'adviso_content_width', 0 );

/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer/init.php';

/**
 *	TGM Plugin Activation
 */
require get_template_directory() . '/framework/tgmpa.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}