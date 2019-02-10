<?php
/**
 * adviso Theme Customizer
 *
 * @package adviso
 */

function adviso_customize_register_misc( $wp_customize ) {

	//Important Links
    $wp_customize->add_section(
        'adviso_sec_premsupport',
        array(
            'title'     => __('Important Links','adviso'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'adviso_important_links',
        array(
            'sanitize_callback' => 'adviso_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Adviso_WP_Customize_Upgrade_Control(
            $wp_customize,
            'adviso_important_links',
            array(
                'settings'		=> 'adviso_important_links',
                'section'		=> 'adviso_sec_premsupport',
                'description'	=> '<a class="adviso-important-links" href="https://inkhive.com/contact-us/" target="_blank"><span>' . __('InkHive Support Forum', 'adviso').'</span><span class="dashicons dashicons-businessman"></span></a>
                                    <a class="adviso-important-links" href="https://demo.inkhive.com/adviso/" target="_blank"><span>'.__('Adviso Live Demo', 'adviso').'</span><span class="dashicons dashicons-welcome-view-site"></span></a>
                                    <a class="adviso-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank"><span>'.__('We Love Our Facebook Fans', 'adviso').'</span><span class="dashicons dashicons-facebook-alt"></span></a>
                                    <a class="adviso-important-links" href="https://www.twitter.com/inkhive/" target="_blank"><span>'.__('Follow us on Twitter', 'adviso').'</span><span class="dashicons dashicons-twitter"></span></a>
                                    <a class="adviso-important-links" href="https://wordpress.org/support/theme/adviso/reviews" target="_blank"><span>'.__('Review Us', 'adviso').'</span><span class="dashicons dashicons-star-filled"></span></a>'
            )
        )
    );
}
add_action( 'customize_register', 'adviso_customize_register_misc' );