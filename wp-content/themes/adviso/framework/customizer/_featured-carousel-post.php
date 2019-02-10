<?php
function adviso_customize_register_fcarousel($wp_customize) {
    $wp_customize->add_section(
        'adviso_eta_section',
        array(
            'title'     => __('Featured Posts - Carousel','adviso'),
            'description'	=> __('Set up the Featured Category Carousel in the Footer of the site', 'adviso'),
            'priority'  => 10,
            'panel'     => 'adviso_featured_posts'
        )
    );

    $wp_customize->add_setting(
        'adviso_eta_enable',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'disable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_eta_enable',
            array(
                'settings'		=> 'adviso_eta_enable',
                'section'		=> 'adviso_eta_section',
                'label'    => __( 'Enable Feature Category Carousel.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_eta_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'adviso_eta_title', array(
            'settings' => 'adviso_eta_title',
            'label'    => __( 'Title for the Carousel','adviso' ),
            'section'  => 'adviso_eta_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'adviso_eta_cat',
        array( 'sanitize_callback' => 'adviso_sanitize_category' )
    );

    $wp_customize->add_control(
        new Adviso_WP_Customize_Category_Control(
            $wp_customize,
            'adviso_eta_cat',
            array(
                'label'    => __('Select the category','adviso'),
                'settings' => 'adviso_eta_cat',
                'section'  => 'adviso_eta_section'
            )
        )
    );
}
add_action('customize_register', 'adviso_customize_register_fcarousel');