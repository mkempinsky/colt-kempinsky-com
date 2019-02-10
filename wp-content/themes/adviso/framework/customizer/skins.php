<?php	
function adviso_customize_register_skins( $wp_customize ) {
	
	$wp_customize->get_section('colors')->title = __('Theme Skin & Colors','adviso');
	$wp_customize->get_section('colors')->panel ='adviso_design_panel';
	$wp_customize->get_control( 'background_color' )-> priority	=	15;

	$header_titlecolor = (object)$wp_customize->get_setting('header_textcolor');
	$header_titlecolor->default = "#ff5722";

	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','adviso');
	
	$wp_customize->add_setting('adviso_header_desccolor', array(
	    'default'     => '#FFFFFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport'	=> 'postMessage'
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'adviso_header_desccolor', array(
			'label' => __('Site Tagline Color','adviso'),
			'section' => 'colors',
			'settings' => 'adviso_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('adviso_top_bar_color', array(
	    'default'     => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport'	=> 'postMessage'
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'adviso_top_bar_color', array(
			'label' => __('Top Bar Color','adviso'),
			'description'	=> __('Color for Site Navigation ,Search Icon and Contact Information on Front Page', 'adviso' ),
			'section' => 'colors',
			'settings' => 'adviso_top_bar_color',
			'type' => 'color',
			'priority'	=> 20,
		) ) 
	);
    
    $wp_customize->add_control(
		new Adviso_WP_Customize_Upgrade_Control(
		$wp_customize,
		'adviso_plus_skin',
			array(
				'settings'	=> array(),
				'section'	=> 'colors',
				'priority'	=> 25,
			)
		)
	);
}
add_action('customize_register', 'adviso_customize_register_skins');
 