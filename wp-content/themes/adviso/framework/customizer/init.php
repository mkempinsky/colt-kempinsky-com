<?php
/**
 * adviso Theme Customizer
 *
 * @package adviso
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adviso_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', 'adviso_customize_register' );

//Load All Individual Settings Based on Sections/Panels.

require_once get_template_directory(). '/framework/customizer/_sanitization.php';
require_once get_template_directory(). '/framework/customizer/_misc-scripts.php';
require_once get_template_directory(). '/framework/customizer/_googlefonts.php';
require_once get_template_directory(). '/framework/customizer/header.php';
require_once get_template_directory(). '/framework/customizer/social-icons.php';
require_once get_template_directory(). '/framework/customizer/contact-info.php';
require_once get_template_directory(). '/framework/customizer/skins.php';
require_once get_template_directory(). '/framework/customizer/_featured-posts.php';
require_once get_template_directory(). '/framework/customizer/_featured-posts-cat.php';
require_once get_template_directory(). '/framework/customizer/_featured-carousel-post.php';
require_once get_template_directory(). '/framework/customizer/_featured-carousel-product.php';
require_once get_template_directory(). '/framework/customizer/_featured-products.php';
require_once get_template_directory(). '/framework/customizer/_layouts.php';
require_once get_template_directory(). '/framework/customizer/_woocommerce.php';
require_once get_template_directory(). '/framework/customizer/featured-areas.php';
require_once get_template_directory(). '/framework/customizer/extend-customizer.php';
require_once get_template_directory(). '/framework/customizer/sorter.php';
require_once get_template_directory(). '/framework/customizer/header-text.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function adviso_customize_preview_js() {
    wp_enqueue_script( 'adviso-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'adviso_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function adviso_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function adviso_customize_partial_blogdescription() {
    bloginfo( 'description' );
}
