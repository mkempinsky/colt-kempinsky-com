<?php
function adviso_customize_register_fproducts($wp_customize) {
    if ( class_exists('woocommerce') ) :
        $wp_customize->add_section(
            'adviso_product_section',
            array(
                'title'     => __('Featured Products','adviso'),
                'priority'  => 10,
                'panel'     => 'adviso_featured_products'
            )
        );

        $wp_customize->add_setting(
            'adviso_product_enable',
            array(
                'sanitize_callback' => 'adviso_sanitize_text',
                'default' => 'disable'
            )
        );

        $wp_customize->add_control(
            new Adviso_Switch_Control(
                $wp_customize,
                'adviso_product_enable',
                array(
                    'settings'		=> 'adviso_product_enable',
                    'section'		=> 'adviso_product_section',
                    'label'    => __( 'Enable Featured Products Area','adviso' ),
                    'enable_disable' 	=> array(
                        'enable' => __( 'Enabled', 'adviso' ),
                        'disable' => __( 'Disabled', 'adviso' )
                    )
                )
            )
        );

        $wp_customize->add_setting(
            'adviso_product_title',
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'adviso_product_title', array(
                'settings' => 'adviso_product_title',
                'label'    => __( 'Title','adviso' ),
                'section'  => 'adviso_product_section',
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'adviso_product_cat',
            array( 'sanitize_callback' => 'adviso_sanitize_product_category' )
        );

        $wp_customize->add_control(
            new WP_Customize_Product_Category_Control(
                $wp_customize,
                'adviso_product_cat',
                array(
                    'label'    => __('Products Category.','adviso'),
                    'settings' => 'adviso_product_cat',
                    'section'  => 'adviso_product_section'
                )
            )
        );
    endif;
}
add_action('customize_register', 'adviso_customize_register_fproducts');