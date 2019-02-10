<?php
/**
 *
 *	Panel for all the Featured Areas of Adviso
 *
**/


function adviso_featured_panel_customize_register( $wp_customize ) {

  // Has to be at the top
  $wp_customize->register_panel_type( 'Adviso_WP_Customize_Panel' );
  $wp_customize->register_section_type( 'Adviso_WP_Customize_Section' );

  $wp_customize->add_panel(
	  new Adviso_WP_Customize_Panel(
		  $wp_customize,
		  'adviso_featured_panel',
		  array(
			  'title'	=> __( 'Featured Areas', 'adviso' ),
			  'description'	=> __('Enable WooCommerce to get Featured Product Areas', 'adviso'),
			  'priority'	=> 15
		  )
	  )
  );
  
  $wp_customize->add_panel(
	  new Adviso_WP_Customize_Panel(
		  $wp_customize,
		  'adviso_featured_posts',
		  array(
			  'title'	=> __( 'Posts', 'adviso' ),
			  'priority'	=> 5,
			  'panel'	=> 'adviso_featured_panel'
		  )
	  )
  );
  
  $wp_customize->add_section(
	    'adviso_plus_posts',
	    array(
		    'title'	=> __('More Areas in Adviso Plus', 'adviso' ),
		    'panel'		=> 'adviso_featured_posts',
		    'priority'	=> 50
	    )
    );
    
    $wp_customize->add_control(
	    'adviso_plus_posts',
	    array(
		    'settings'	=> array(),
		    'section'	=> 'adviso_plus_posts',
		    'input_attrs'=> array(
			    'class'		=> 'adviso_plus'
		    )
	    )
    );
  
  if ( class_exists('woocommerce') ) :
	  $wp_customize->add_panel(
		  new Adviso_WP_Customize_Panel(
			  $wp_customize,
			  'adviso_featured_products',
			  array(
				  'title'	=> __( 'Products', 'adviso' ),
				  'priority'	=> 10,
				  'panel'	=> 'adviso_featured_panel'
			  )
		  )
	  );
	  
	  $wp_customize->add_section(
	    'adviso_plus_products',
	    array(
		    'title'	=> __('More Areas in Adviso Plus', 'adviso' ),
		    'panel'		=> 'adviso_featured_products',
		    'priority'	=> 50
	    )
    );
    
    $wp_customize->add_control(
	    'adviso_plus_products',
	    array(
		    'settings'	=> array(),
		    'section'	=> 'adviso_plus_products',
		    'input_attrs'=> array(
			    'class'		=> 'adviso_plus'
		    )
	    )
    );
	  
  else :
  	$wp_customize->add_section(
		  new Adviso_WP_Customize_Section(
			  $wp_customize,
			  'adviso_placeholder',
			  array(
				  'title'	=> __( 'Enable WooCommerce for Products', 'adviso' ),
				  'priority'	=> 10,
				  'panel'	=> 'adviso_featured_panel'
			  )
		  )
	  );
	  
	  $wp_customize->add_control(
		  'adviso_placeholder_control',
		  array(
			  'settings'	=> array(),
			  'section'	=>	'adviso_placeholder'
		  )
	  );
	 endif;
  
  
  // The Sections and their Controls have been defined in their respective files
  
}

add_action( 'customize_register', 'adviso_featured_panel_customize_register' );

