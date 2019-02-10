<?php
/**
 * adviso functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adviso
 */

if ( ! function_exists( 'adviso_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function adviso_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on adviso, use a find and replace
         * to change 'adviso' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'adviso', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'adviso' ),
            'mobile' => __( 'Mobile Menu', 'adviso' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'adviso_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        
        // Add Gutenberg Wide Image Support
        add_theme_support('align-wide');

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_image_size('adviso-sq-thumb', 600,600, true );
        add_image_size('adviso-pop-thumb',330, 220, true );
        add_image_size('adviso-offer-thumb', 542, 340, true );
        //add_image_size('product-thumb', 250, 400, true);
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 280,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        //Declare woocommerce support
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        
    }
endif;
add_action( 'after_setup_theme', 'adviso_setup' );