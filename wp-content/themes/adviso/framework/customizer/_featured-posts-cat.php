<?php
function adviso_customize_register_fp_cat( $wp_customize ) {
    //FEATURED POSTS
    $wp_customize->add_section(
        'adviso_featposts_cat',
        array(
            'title'     => __('Featured Categories','adviso'),
            'priority'  => 20,
            'panel' => 'adviso_featured_posts'
        )
    );

    $wp_customize->add_setting(
        'adviso_featposts_cat_enable',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'disable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_featposts_cat_enable',
            array(
                'settings'		=> 'adviso_featposts_cat_enable',
                'section'		=> 'adviso_featposts_cat',
                'label'    => __( 'Enable/Disable Featured Category.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_featcat_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'adviso_featcat_title', array(
            'settings' => 'adviso_featcat_title',
            'label'    => __( 'Title', 'adviso' ),
            'section'  => 'adviso_featposts_cat',
            'type'     => 'text',
        )
    );

    for( $x = 1; $x <= 3; $x++ ):

    $wp_customize->add_setting(
        'adviso_featposts_category_'.$x,
        array( 'sanitize_callback' => 'adviso_sanitize_category' )
    );

    $wp_customize->add_control(
        new Adviso_WP_Customize_Category_Control(
            $wp_customize,
            'adviso_featposts_category_'.$x,
            array(
                'label'    => __('Select Featured Category ','adviso').$x,
                'settings' => 'adviso_featposts_category_'.$x,
                'section'  => 'adviso_featposts_cat'
            )
        )
    );

    endfor;
}
add_action( 'customize_register', 'adviso_customize_register_fp_cat' );