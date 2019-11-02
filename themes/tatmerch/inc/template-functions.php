<?php

/**
 * E-mail link
 */

function tatm_the_mail_link( $mail = false ){
	if ( $mail )
		return '<a href="mailto:'. esc_attr( $mail ) .'">'. $mail .'</a>';
}


/**
 * Check for show advertisement
 */

function tatm_is_show_ad(){
	$is_show_ad = get_option( 'tatm_ad_show', false );

	return $is_show_ad;
}