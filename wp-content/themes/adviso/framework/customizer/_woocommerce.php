<?php
/**
 *
 *	Customizer Conrtols for WcooCommerce Section
 *
**/


function adviso_woocommerce_controls( $wp_customize ) {
	
	if ( class_exists('woocommerce') ) :
		$wp_customize->add_setting(
			'adviso_shop_column',
			array(
				'default'	=> '3',
				'sanitize_callback'	=> 'absint'
			)
		);
		
		$wp_customize->add_control(
			'adviso_shop_column',
			array(
				'section'	=> 'woocommerce_product_catalog',
				'label'	=> __('Shop Page Columns', 'adviso'),
				'description'	=> __('Choose how many columns to display on the main shop page', 'adviso'),
				'type'	=> 'select',
				'priority'	=> 5,
				'settings'	=> 'adviso_shop_column',
				'choices'	=> array(
					'2'	=> __('2 Columns', 'adviso'),
					'3'	=> __('3 Columns', 'adviso'),
					'4'	=> __('4 Columns', 'adviso')
				)
			)
		);
		
		$wp_customize->add_setting(
			'adviso_top_cart_toggle',
			array(
				'default'	=> false,
				'sanitize_callback'	=> 'adviso_sanitize_checkbox'
			)
		);
		
		$wp_customize->add_control(
			'adviso_top_cart_toggle',
			array(
				'section'	=> 'woocommerce_product_catalog',
				'label'	=> __('Enable the Cart Icon in Header', 'adviso'),
				'type'	=> 'checkbox',
				'priority'	=> 3
			)
		);
	endif;
}

add_action( 'customize_register', 'adviso_woocommerce_controls' );