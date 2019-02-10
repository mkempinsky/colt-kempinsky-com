<?php
function adviso_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('adviso_social_section', array(
			'title' => __('Social Icons','adviso'),
			'priority' => 44 ,
			'panel' => 'adviso_header_panel'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','adviso'),
					'facebook' => __('Facebook','adviso'),
					'twitter' => __('Twitter','adviso'),
					'google-plus' => __('Google Plus','adviso'),
					'instagram' => __('Instagram','adviso'),
					'rss' => __('RSS Feeds','adviso'),
					'pinterest-p' => __('Pinterest','adviso'),
					'vimeo-square' => __('Vimeo','adviso'),
					'youtube' => __('Youtube','adviso'),
					'flickr' => __('Flickr','adviso'),
				);


    $social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'adviso_social_'.$x, array(
				'sanitize_callback' => 'adviso_sanitize_social',
				'default' => 'none',
				'transport'	=> 'postMessage'
			));

		$wp_customize->add_control( 'adviso_social_'.$x, array(
					'settings' => 'adviso_social_'.$x,
					'label' => __('Icon ','adviso').$x,
					'section' => 'adviso_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'adviso_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'adviso_social_url'.$x, array(
					'settings' => 'adviso_social_url'.$x,
					'description' => __('Icon ','adviso').$x.__(' Url','adviso'),
					'section' => 'adviso_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function adviso_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'pinterest-p',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return 'adviso';	
	}
}
add_action( 'customize_register', 'adviso_customize_register_social' );