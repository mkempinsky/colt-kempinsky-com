<?php
//FEATURED POSTS
// CREATE THE FCA PANEL
function adviso_customize_register_fp( $wp_customize ) {

    $wp_customize->add_section(
        'adviso_featposts',
        array(
            'title'     => __('Featured Posts','adviso'),
            'priority'  => 10,
            'panel' 	=> 'adviso_featured_posts'
        )
    );

    $wp_customize->add_setting(
        'adviso_featposts_enable',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'disable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_featposts_enable',
            array(
                'settings'		=> 'adviso_featposts_enable',
                'section'		=> 'adviso_featposts',
                'label'    => __( 'Enable Feature Category on Front Page.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_featposts_heading',
        array( 'sanitize_callback' => 'adviso_sanitize_text' )
    );

    $wp_customize->add_control(
        'adivos_featposts_heading',
        array(
            'settings' => 'adviso_featposts_heading',
            'section' => 'adviso_featposts',
            'label' => __('Heading For Featured Category', 'adviso'),
            'type' => 'text'
        )
    );

    $wp_customize->add_setting(
        'adviso_featposts_cat',
        array( 'sanitize_callback' => 'adviso_sanitize_category' )
    );

    $wp_customize->add_control(
        new Adviso_WP_Customize_Category_Control(
            $wp_customize,
            'adviso_featposts_cat',
            array(
                'label'    => __('Select the Category','adviso'),
                'settings' => 'adviso_featposts_cat',
                'section'  => 'adviso_featposts'
            )
        )
    );
}
add_action( 'customize_register', 'adviso_customize_register_fp', 15 );