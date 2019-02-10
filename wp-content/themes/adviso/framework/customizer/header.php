<?php
function adviso_customize_register_header($wp_customize) {
    $wp_customize->get_section('title_tagline')->panel = 'adviso_header_panel';
    $wp_customize->get_section('header_image')->panel = 'adviso_header_panel';
    $wp_customize->get_section('header_image')->priority = 35;

    $wp_customize->add_panel('adviso_header_panel', array(
        'title' => __('Header Settings', 'adviso'),
        'priority' => 10,
    ));
    
    $wp_customize->add_section(
	    'adviso_plus_header',
	    array(
		    'title'	=> __('More Options in Adviso Plus', 'adviso' ),
		    'panel'		=> 'adviso_header_panel',
		    'priority'	=> 50
	    )
    );
    
    $wp_customize->add_control(
	    'adviso_plus_header',
	    array(
		    'settings'	=> array(),
		    'section'	=> 'adviso_plus_header',
		    'input_attrs'=> array(
			    'class'		=> 'adviso_plus'
		    )
	    )
    );

}
add_action('customize_register', 'adviso_customize_register_header');