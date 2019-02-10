<?php
function adviso_header_text($wp_customize) {
   

    $wp_customize->add_section(
    	'adviso_header_text_section', 
		array(
	        'title' => __('Header Text', 'adviso'),
	        'priority' => 37,
	        'panel'	=> 'adviso_header_panel'
		)
	);
	
	$wp_customize->add_setting(
		'adviso_header_text',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'transport'		=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'adviso_header_text',
		array(
			'label'	=> __('Enter the Header Text', 'adviso'),
			'type'	=> 'textarea',
			'section'	=> 'adviso_header_text_section',
			'priority'	=> 5
		)
	);
	
	$wp_customize->add_setting(
		'adviso_header_cta_enable',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'adviso_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'adviso_header_cta_enable',
		array(
			'label'		=> __('Enable Header Call-To-Action Button', 'adviso'),
			'type'		=> 'checkbox',
			'section'	=> 'adviso_header_text_section',
			'priority'	=> 10
		)
	);
	
	$wp_customize->add_setting(
		'adviso_header_cta',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		)
	);
	
	$wp_customize->add_control(
		'adviso_header_cta',
		array(
			'label'	=> __('Enter the CTA Button Text', 'adviso'),
			'type'	=> 'text',
			'section'	=> 'adviso_header_text_section',
			'priority'	=> 15
		)
	);
	
	$wp_customize->add_setting(
		'adviso_header_cta_url',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'adviso_header_cta_url',
		array(
			'label'	=> __('Enter the CTA Button URL', 'adviso'),
			'type'	=> 'text',
			'section'	=> 'adviso_header_text_section',
			'priority'	=> 20
		)
	);

}
add_action( 'customize_register', 'adviso_header_text' );