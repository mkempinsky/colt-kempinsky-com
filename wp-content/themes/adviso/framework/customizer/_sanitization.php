<?php
/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
function adviso_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function adviso_sanitize_positive_number( $input ) {
    if ( ($input >= 0) && is_numeric($input) )
        return $input;
    else
        return '';
}

function adviso_sanitize_category( $input ) {
    if ( term_exists(get_cat_name( $input ), 'category') )
        return $input;
    else
        return '';
}

function adviso_sanitize_product_category( $input ) {
    if ( get_term( $input, 'product_cat' ) )
        return $input;
    else
        return '';
}

function adviso_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function adviso_sanitize_radio( $input, $setting ) {
	
	// Ensure input is a slug
	$input = sanitize_key( $input );
	
	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}