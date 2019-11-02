<?php

/**
 * Add Gutenberg blocks
 */

function tatm_acf_init(){
	if( function_exists('acf_register_block_type') ) {

		/**
		 * Promo block
		 */
		/*acf_register_block_type( array(
			'name'            => 'promo',
			'title'           => __( 'Promo Block', 'resto' ),
			'mode'            => 'edit',
			'render_template' => 'acf/blocks/promo.php',
			'category'        => 'formatting',
			'icon'            => 'media-interactive',
			'keywords'        => array( 'promo', 'top' ),
			'supports'        => array(
				'mode' => false,
			),
		) );*/
	}
}

add_action('acf/init', 'tatm_acf_init');