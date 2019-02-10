<?php
/**
 *
 *	Defining the Sorter Control
 *
**/

function adviso_sorter_customizer_control( $wp_customize ) {

	$wp_customize->add_section(
		'adviso_sorter',
		array(
			'panel'	=> 'adviso_featured_panel',
			'title'	=> __('Sorter', 'adviso'),
			'description'	=> __('Specify the Order of the Featured Areas on Front Page', 'adviso'),
			'priority'	=> 15
		) 
	);
  
    $wp_customize->add_setting(
			'adviso_sorter_control',
			array( 
			'default'			=> 'feat_posts,feat_posts_car,feat_cat,feat_prod,feat_prod_car',
			'sanitize_callback'	=> 'sanitize_text_field'
			 )
		);
			
	$wp_customize->add_control(
	    new Adviso_Sorter_Custom_Control(
	        $wp_customize,
	        'adviso_sorter_control',
	        array(
	            'label' => __('Pick and Drag','adviso'),
	            'description' => __('You need to enable the respective Featured Areas from their Sections.','adviso'),
	            'section' => 'adviso_sorter',
	            'settings' => 'adviso_sorter_control',		       
	        )
		)
	);
}

add_action( 'customize_register', 'adviso_sorter_customizer_control' );