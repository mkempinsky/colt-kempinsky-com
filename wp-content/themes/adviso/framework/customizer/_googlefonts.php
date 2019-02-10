<?php
	function adviso_customize_register_fonts( $wp_customize ) {
	//Fonts
/*
	$wp_customize->add_section(
	    'adviso_typo_options',
	    array(
	        'title'     => __('Typography','adviso'),
	        'priority'  => 41,
	        'description' => __('Defaults: Droid Serif, Ubuntu.','adviso'),
	        'panel' => 'adviso_design_panel'
	    )
	);
*/
	
	$wp_customize->add_section(
	  new Adviso_WP_Customize_Section(
		  $wp_customize,
		  'adviso_typo_options',
		  array(
				'title'     => __('Typography','adviso'),
		        'priority'  => 41,
		        'panel' => 'adviso_design_panel'
			)
		)
	);
	
	$wp_customize->add_section(
	  new Adviso_WP_Customize_Section(
		  $wp_customize,
		  'adviso_section_general_typo',
		  array(
				'title'     => __('General Settings','adviso'),
		        'priority'  => 5,
		        'panel' => 'adviso_design_panel',
		        'section'	=> 'adviso_typo_options'
			)
		)
	);
	
	$font_array = array('Arvo','Pacifico','Source Sans Pro','Ubuntu','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Arvo','Slabo','Lora');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'adviso_title_font1',
		array(
			'default'=> 'Arvo',
			'sanitize_callback' => 'adviso_sanitize_gfont',
			'transport'	=> 'postMessage'
		)
	);
	
	function adviso_sanitize_gfont( $input ) {
		if ( in_array($input, array('Arvo','Pacifico','Source Sans Pro','Ubuntu','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Arvo','Slabo','Lora',) ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'adviso_title_font1',array(
			'label' => __('Title Font','adviso'),
			'description'	=> __('General Font for the Titles and Headings in the theme', 'adviso'),
			'settings' => 'adviso_title_font1',
			'section'  => 'adviso_section_general_typo',
			'type' => 'select',
			'choices' => $fonts,
			'priority'	=> 5
		)
	);
	
	$wp_customize->add_setting(
		'adviso_body_font1',
			array(	'default'=> 'Ubuntu',
					'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_body_font1',array(
				'label' => __('Body Font','adviso'),
				'description'	=> __('General Font for the the body text in the theme', 'adviso'),
				'settings' => 'adviso_body_font1',
				'section'  => 'adviso_section_general_typo',
				'type' => 'select',
				'choices' => $fonts,
				'priority'	=> 10
			)
	);
	
	$wp_customize->add_section(
	  new Adviso_WP_Customize_Section(
		  $wp_customize,
		  'adviso_section_title_typo',
		  array(
				'title'     => __('Site Title','adviso'),
		        'priority'  => 10,
		        'panel' => 'adviso_design_panel',
		        'section'	=> 'adviso_typo_options'
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_site_title_font',
			array(	'default'=> 'Arvo',
					'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_site_title_font',array(
				'label' 	=> __('Site Title Font','adviso'),
				'description'	=> __('Font for the site title of the theme', 'adviso'),
				'settings' 	=> 'adviso_site_title_font',
				'section'  	=> 'adviso_section_title_typo',
				'type' 		=> 'select',
				'choices' 	=> $fonts,
				'priority'	=> 5,
			)
	);
	
	$font_sizes	=	array(
					'16'	=> __('S', 'adviso'),
					'18'	=> __('M', 'adviso'),
					'24'	=> __('L', 'adviso'),
					'36'	=> __('XL', 'adviso'),
					'48'	=> __('XXL', 'adviso'),
	);
	
	$font_sizes_body	=	array(
					'12'	=> __('12', 'adviso'),
					'14'	=> __('14', 'adviso'),
					'16'	=> __('16', 'adviso'),
					'18'	=> __('18', 'adviso'),
					'20'	=> __('20', 'adviso'),
	);
	
	function adviso_sanitize_font_size( $input ) {
		if ( in_array($input, array('16','18','24','36', '48') ) )
			return $input;
		else
			return '';	
	}
	
	function adviso_sanitize_body_font_size( $input ) {
		if ( in_array($input, array('12','14','16','18', '20') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_setting(
		'adviso_site_title_font_size',
		array(
			'default'			=> '48',
			'sanitize_callback'	=> 'adviso_sanitize_font_size'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Size_Control(
		$wp_customize,
		'adviso_site_title_font_size',
			array(
				'label'		=> __('Font Size', 'adviso'),
				'settings'	=> 'adviso_site_title_font_size',
				'section'	=> 'adviso_section_title_typo',
				'choices'	=> $font_sizes,
				'priority'	=> 15
			)
		)
	);
	
	$font_weights	=	array('300','400','700');
	
	function adviso_sanitize_font_weight( $input ) {
		if ( in_array($input, array('300','400','700') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_setting(
		'adviso_site_title_font_weight',
		array(
			'default'			=> '400',
			'sanitize_callback'	=> 'adviso_sanitize_font_weight'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Weight_Control(
			$wp_customize,
			'adviso_site_title_font_weight',
			array(
				'label'		=> __('Font Weight', 'adviso'),
				'description'	=> __('This might not work if the Font does not have the required weight', 'adviso'),
				'settings'	=> 'adviso_site_title_font_weight',
				'section'	=> 'adviso_section_title_typo',
				'choices'	=> $font_weights,
				'priority'	=> 20
			)
		)
	);
	
	
	/*---- Navigation Typography ----*/
	$wp_customize->add_section(
	  new Adviso_WP_Customize_Section(
		  $wp_customize,
		  'adviso_nav_typo',
		  array(
				'title'     => __('Navigation','adviso'),
		        'priority'  => 12,
		        'panel' 	=> 'adviso_design_panel',
		        'section'	=> 'adviso_typo_options'
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_nav_title_font',
			array(	
				'default'			=> 'Arvo',
				'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_nav_title_font1',array(
				'label' 	=> __('Menu Font','adviso'),
				'settings' 	=> 'adviso_nav_title_font',
				'section'  	=> 'adviso_nav_typo',
				'type' 		=> 'select',
				'choices' 	=> $fonts,
				'priority'	=> 5,
			)
	);
	
	$wp_customize->add_setting(
		'adviso_nav_title_font_size',
		array(
			'default'			=> '14',
			'sanitize_callback'	=> 'adviso_sanitize_body_font_size'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Size_Control(
		$wp_customize,
		'adviso_nav_title_font_size',
			array(
				'label'		=> __('Font Size', 'adviso'),
				'settings'	=> 'adviso_nav_title_font_size',
				'section'	=> 'adviso_nav_typo',
				'choices'	=> $font_sizes_body,
				'priority'	=> 15
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_nav_title_font_weight',
		array(
			'default'			=> '400',
			'sanitize_callback'	=> 'adviso_sanitize_font_weight'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Weight_Control(
			$wp_customize,
			'adviso_nav_title_font_weight',
			array(
				'label'		=> __('Font Weight', 'adviso'),
				'description'	=> __('This might not work if the Font does not have the required weight', 'adviso'),
				'settings'	=> 'adviso_nav_title_font_weight',
				'section'	=> 'adviso_nav_typo',
				'choices'	=> $font_weights,
				'priority'	=> 20
			)
		)
	);
	
	
	/*---- Blog Page Typogrphy ----*/
	$wp_customize->add_section(
	  new Adviso_WP_Customize_Section(
		  $wp_customize,
		  'adviso_blog_typo',
		  array(
				'title'     => __('Blog Page','adviso'),
		        'priority'  => 20,
		        'panel' 	=> 'adviso_design_panel',
		        'section'	=> 'adviso_typo_options'
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_title_font1',
			array(	
				'default'			=> 'Arvo',
				'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_blog_title_font1',array(
				'label' 	=> __('Title Font','adviso'),
				'settings' 	=> 'adviso_blog_title_font1',
				'section'  	=> 'adviso_blog_typo',
				'type' 		=> 'select',
				'choices' 	=> $fonts,
				'priority'	=> 5,
			)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_title_font_size',
		array(
			'default'			=> '24',
			'sanitize_callback'	=> 'adviso_sanitize_font_size'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Size_Control(
		$wp_customize,
		'adviso_blog_title_font_size',
			array(
				'label'		=> __('Font Size', 'adviso'),
				'settings'	=> 'adviso_blog_title_font_size',
				'section'	=> 'adviso_blog_typo',
				'choices'	=> $font_sizes,
				'priority'	=> 15
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_title_font_weight',
		array(
			'default'			=> '400',
			'sanitize_callback'	=> 'adviso_sanitize_font_weight'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Weight_Control(
			$wp_customize,
			'adviso_blog_title_font_weight',
			array(
				'label'		=> __('Font Weight', 'adviso'),
				'description'	=> __('This might not work if the Font does not have the required weight', 'adviso'),
				'settings'	=> 'adviso_blog_title_font_weight',
				'section'	=> 'adviso_blog_typo',
				'choices'	=> $font_weights,
				'priority'	=> 20
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_body_font',
			array(	
				'default'			=> 'Ubuntu',
				'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_blog_body_font',array(
			'label' 	=> __('Body Font','adviso'),
			'settings' 	=> 'adviso_blog_body_font',
			'section'  	=> 'adviso_blog_typo',
			'type' 		=> 'select',
			'choices' 	=> $fonts,
			'priority'	=> 25,
		)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_body_font_size',
		array(
			'default'			=> '16',
			'sanitize_callback'	=> 'adviso_sanitize_body_font_size'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Size_Control(
		$wp_customize,
		'adviso_blog_body_font_size',
			array(
				'label'		=> __('Font Size', 'adviso'),
				'settings'	=> 'adviso_blog_body_font_size',
				'section'	=> 'adviso_blog_typo',
				'choices'	=> $font_sizes_body,
				'priority'	=> 30
			)
		)
	);
	
	$wp_customize->add_setting(
		'adviso_blog_body_font_weight',
		array(
			'default'			=> '400',
			'sanitize_callback'	=> 'adviso_sanitize_font_weight'
		)
	);
	
	$wp_customize->add_control(
		new Adviso_Font_Weight_Control(
			$wp_customize,
			'adviso_blog_body_font_weight',
			array(
				'label'		=> __('Font Weight', 'adviso'),
				'description'	=> __('This might not work if the Font does not have the required weight', 'adviso'),
				'settings'	=> 'adviso_blog_body_font_weight',
				'section'	=> 'adviso_blog_typo',
				'choices'	=> $font_weights,
				'priority'	=> 35
			)
		)
	);
	
	
	/*----Adviso Plus Upsell ----*/
	
	
	
	$wp_customize->add_control(
		new Adviso_WP_Customize_Upgrade_Control(
		$wp_customize,
		'adviso_plus_notice',
			array(
				'settings'	=> array(),
				'section'	=> 'adviso_typo_options',
				'priority'	=> 25,
				'description'		=> '<a href="https://www.inkhive.com/product/adviso-plus" target="_blank" class="adviso_button">More Options in Adviso Plus</a>',
			)
		)
	);
	
}
add_action('customize_register', 'adviso_customize_register_fonts');