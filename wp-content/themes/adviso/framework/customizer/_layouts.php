<?php
function adviso_customize_register_layouts( $wp_customize ) {
    $wp_customize->get_section('background_image')->panel = 'adviso_design_panel';
    
    // Layout and Design
    
    $wp_customize->add_panel(
		new Adviso_WP_Customize_Panel(
		  $wp_customize,
		  'adviso_design_panel',
		  array(
			  'title'	=> __( 'Design & Layout', 'adviso' ),
			  'priority'	=> 20,
			  'capability'     => 'edit_theme_options',
			  'theme_supports' => '',
		  )
		)
	);
    
    $wp_customize->add_section(
        'adviso_design_options',
        array(
            'title'     => __('Blog Layout','adviso'),
            'priority'  => 0,
            'panel'     => 'adviso_design_panel'
        )
    );


    $wp_customize->add_setting(
        'adviso_blog_layout',
        array(
            'default' => 'adviso',
            'sanitize_callback' => 'adviso_sanitize_blog_layout',
        )
    );

    function adviso_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('blog','grid_2_column','adviso') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'adviso_blog_layout',array(
            'label' => __('Select Layout','adviso'),
            'description' => __('Use 3 Column Layouts, only after disabling sidebar for the page.','adviso'),
            'settings' => 'adviso_blog_layout',
            'section'  => 'adviso_design_options',
            'type' => 'select',
            'priority'	=> 5,
            'choices' => array(
                'blog' => __('Standard Blog Layout','adviso'),
                'adviso' => __('Adviso Theme Layout','adviso'),
                'grid_2_column' => __('Grid - 2 Column','adviso'),
            )
        )
    );
    
    $wp_customize->add_setting( 'adviso_blog_sidebar_layout',
		array(
			'default' => 'sidebarright',
			'transport'	=> 'postMessage',
			'sanitize_callback' => 'adviso_sidebar_sanitize'
		)
	);
	
	$wp_customize->add_control( 
		new Adviso_Image_Radio_Custom_Control( 
			$wp_customize,
			'adviso_blog_sidebar_layout',
			array(
				'label' => __( 'Sidebar Layout', 'adviso' ),
				'description'	=> __('Sidebar can be toggled from Sidebar Layout Section', 'adviso'),
				'section' => 'adviso_design_options',
				'settings' => 'adviso_blog_sidebar_layout',
				'priority'	=> 10,
				'choices' => array(
					'sidebarleft' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/left-sidebar.png',
						'name' => __( 'Left Sidebar', 'adviso' )
					),
					'sidebarright' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/right-sidebar.png',
						'name' => __( 'Right Sidebar', 'adviso' )
					)
				)
			)
		)
	);
		
	function adviso_sidebar_sanitize( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
    
    $wp_customize->add_control(
		new Adviso_WP_Customize_Upgrade_Control(
		$wp_customize,
		'adviso_plus_blog_layout',
			array(
				'settings'	=> array(),
				'section'	=> 'adviso_design_options',
				'priority'	=> 25,
				'description'		=> '<a href="https://www.inkhive.com/product/adviso-plus" target="_blank" class="adviso_button">More Options in Adviso Plus</a>',
			)
		)
	);

    //Sidebar Layout
    $wp_customize->add_section(
        'adviso_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','adviso'),
            'priority'  => 0,
            'panel'     => 'adviso_design_panel'
        )
    );
    
    $wp_customize->add_setting(
        'adviso_disable_sidebar',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar',
            array(
                'settings'		=> 'adviso_disable_sidebar',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar Everywhere.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_disable_sidebar_home',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar_home',
            array(
                'settings'		=> 'adviso_disable_sidebar_home',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Home/Blog.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                ),
                'active_callback' => 'adviso_show_sidebar_options',
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_disable_sidebar_front',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar_front',
            array(
                'settings'		=> 'adviso_disable_sidebar_front',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Front Page.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                ),
                'active_callback' => 'adviso_show_sidebar_options',
            )
        )
    );
    
    $wp_customize->add_setting(
        'adviso_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'adviso_sanitize_positive_number',
            'transport'	=> 'postMessage'
        )
    );

    $wp_customize->add_control(
        'adviso_sidebar_width', array(
            'settings' => 'adviso_sidebar_width',
            'label'    => __( 'Sidebar Width','adviso' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','adviso'),
            'section'  => 'adviso_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'adviso_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );
    
    $wp_customize->add_control(
		new Adviso_WP_Customize_Upgrade_Control(
		$wp_customize,
		'adviso_plus_sidebar_layout',
			array(
				'settings'	=> array(),
				'section'	=> 'adviso_sidebar_options',
				'priority'	=> 25,
				'description'		=> '<a href="https://www.inkhive.com/product/adviso-plus" target="_blank" class="adviso_button">More Options in Adviso Plus</a>',
			)
		)
	);

    /* Active Callback Function */
    function adviso_show_sidebar_options($control) {

        $option = $control->manager->get_setting('adviso_disable_sidebar');
        return $option->value() == 'enable' ;

    }

    //Custom Footer Text
    $wp_customize-> add_section(
        'adviso_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','adviso'),
            'description'	=> __('Enter your Own Copyright Text.','adviso'),
            'priority'		=> 11,
            'panel'			=> 'adviso_design_panel'
        )
    );

    $wp_customize->add_setting(
        'adviso_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'adviso_footer_text',
        array(
            'section' => 'adviso_custom_footer',
            'settings' => 'adviso_footer_text',
            'type' => 'text'
        )
    );

}
add_action('customize_register', 'adviso_customize_register_layouts');