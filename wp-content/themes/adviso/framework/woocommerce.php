<?php
/*
** WooCommerce Compatibility File for Adviso Theme
** Created by Rohit Tripathi, Rohitink.com (c) 2015
** @package adviso
*/

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'adviso_dequeue_woocommerce_styles' );
function adviso_dequeue_woocommerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}

/**
 * Set Default Thumbnail Sizes for Woo Commerce Product Pages, on Theme Activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
	add_action( 'init', 'adviso_woocommerce_image_dimensions', 1 );
/**
 * Define image sizes
 */
function adviso_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

//Custom Hooking for Product Loop Page Items.
function adviso_before_wc_title() {
	echo "<div class='product-desc'>";
}
add_action('woocommerce_before_shop_loop_item_title', 'adviso_before_wc_title', 15);

function adviso_after_wc_title() {
	echo "</div>";
}
add_action('woocommerce_after_shop_loop_item_title', 'adviso_after_wc_title');

/**
 * Remove the "shop" title on the main shop page
*/
function adviso_woo_hide_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title' , 'adviso_woo_hide_page_title' );

/**
 * Change the Breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'adviso_change_breadcrumb_delimiter' );
function adviso_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>>'
	$defaults['delimiter'] = ' <i class="fa fa-angle-right"></i> ';
	return $defaults;
}

/*
 * WooCommerce Output Wrappers for for Single Product(single-product.php) and Product Archives(archive-product.php)
 */
add_action('woocommerce_before_main_content', 'adviso_single_custom_header', 1 );

function adviso_single_custom_header() {
	
    if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <div class="header-title col-md-12">
            <span><?php woocommerce_page_title(); ?></span>
        </div>
    <?php endif;
	    
}


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
add_filter( 'woocommerce_output_related_products_args', 'adviso_change_related_products_count' );

function adviso_change_related_products_count( $args ) {
     $args['posts_per_page'] = 3;
     $args['columns'] = 3;

     return $args;
}

//Product Gallery Size
function adviso_gallery_four_columns(  ){
    return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'adviso_gallery_four_columns');

// Change number or products per row to 3
add_filter('loop_shop_columns', 'adviso_loop_columns');
if (!function_exists('adviso_loop_columns')) {
	function adviso_loop_columns() {
		return 3; // 3 products per row
	}
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'adviso_header_add_to_cart_fragment' );

function adviso_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'adviso'); ?>">
						<div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'adviso'), WC()->cart->cart_contents_count);?></div>
						<div class="total"> <?php echo WC()->cart->get_cart_total(); ?>
						</div>
					</a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}


// Breadcrumb outside the #primary div
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 5 );


/**
 *
 * Setting Up the Product Thumbnail Layout
 *
**/

add_action( 'woocommerce_before_shop_loop_item_title', 'adviso_product_title_wrapper_start', 15 );
function adviso_product_title_wrapper_start() {
	 echo "<div class='product-title-wrapper'>";
}

add_action( 'woocommerce_shop_loop_item_title', 'adviso_product_title_wrapper_end', 11 );
function adviso_product_title_wrapper_end() {
	echo "</div>";
}

add_action( 'woocommerce_shop_loop_item_title', 'adviso_product_meta_wrapper_start', 11 );
function adviso_product_meta_wrapper_start() {
	echo "<div class='product-meta-wrapper'>";
}

add_action( 'woocommerce_after_shop_loop_item_title', 'adviso_product_meta_wrapper_end', 10 );
function adviso_product_meta_wrapper_end() {
	echo "</div>";
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );



// Insert a div for Image and Sale Flash
add_action( 'woocommerce_before_shop_loop_item', 'adviso_product_thumbnail_container_start', 11 );
function adviso_product_thumbnail_container_start() {
	
	echo '<div class="product-thumb-container">';
	
}

add_action( 'woocommerce_before_shop_loop_item_title', 'adviso_product_thumbnail_container_end', 11 );
function adviso_product_thumbnail_container_end() {
	
	echo '</div>';
	
}

add_filter( 'woocommerce_loop_add_to_cart_args', 'adviso_material_classes', 10, 2 );
function adviso_material_classes( $args, $product ) {
	
	$args['class']	.=	' hello mdl-button mdl-js-button mdl-button--raised mdl-button--colored';
	
	return $args;
}

add_filter( 'gettext', 'adviso_custom_view_cart', 20, 3 );
function adviso_custom_view_cart( $translated_text, $text, $domain ) {
    switch ( strtolower( $translated_text ) ) {
        case 'view cart' :
            $translated_text = '';
            break;
    }
    return $translated_text;
}


/**
 *
 * Setting Up the Single Product Page
 *
**/

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 3 );
