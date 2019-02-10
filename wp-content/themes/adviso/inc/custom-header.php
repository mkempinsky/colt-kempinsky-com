<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package adviso
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses adviso_header_style()
 */
function adviso_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adviso_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/assets/images/header.jpg',
		'default-text-color'     => 'ff5722',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'adviso_header_style',
	) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/assets/images/header.jpg',
                'thumbnail_url'    => '%s/assets/images/header.jpg',
                'description'    => __('Default Header Image', 'adviso')
            )
        )
    );
}
add_action( 'after_setup_theme', 'adviso_custom_header_setup' );

if ( ! function_exists( 'adviso_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see adviso_custom_header_setup().
     */
    function adviso_header_style() {

        if ((is_page() || is_single()) && has_post_thumbnail()) :
            $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
            ?>
            <style>
                #masthead {
                    display: flex;
                    flex-direction: column;
                    background-image: url(<?php echo esc_url( $image_data[0] ) ?>);
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    
                }
            </style>
        <?php
        else : ?>
            <style>
                #masthead {
                    display: flex;
                    flex-direction: column;
                    background-image: url(<?php header_image(); ?>);
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                }
            </style> <?php
        endif;

    }
endif;