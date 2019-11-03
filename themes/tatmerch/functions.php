<?php

/**
 * Theme Setup
 */

function tatm_setup() {

	/**
	 * Load translations
	 */
	load_theme_textdomain( 'tatm', get_template_directory() . '/languages' );

	/**
	 * Register menus
	 */
	register_nav_menus( array(
		'main_menu' => __( 'Main Menu', 'tatm' ),
	) );

	/**
	 * Theme supports
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	/**
	 * Theme filters
	 */
	add_filter( 'widget_text', 'do_shortcode' );
}

add_action( 'after_setup_theme', 'tatm_setup' );


/**
 * Add styles and scripts
 */

function tatm_scripts_styles() {

	/**
	 * Styles
	 */
	
	wp_enqueue_style( 'tatm-site', get_template_directory_uri() . '/css/site.css', array(), '20191102' );
	wp_enqueue_style( 'tatm-site-mobile', get_template_directory_uri() . '/css/site-mobile.css', array(), '20191102', 'screen and (min-width: 320px) and (max-width: 480px)' );

	/*
	wp_enqueue_style( 'tatm-owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css', array(), '20191008' );
	wp_enqueue_style( 'tatm-fancybox', get_template_directory_uri() . '/css/fancybox.css', array(), '20191008' );
	wp_enqueue_style( 'tatm-wc', get_template_directory_uri() . '/css/woocommerce.css', array(), '20191008' );
	wp_enqueue_style( 'tatm-site', get_template_directory_uri() . '/css/site.css', array(), '20191008' );*/


	/**
	 * Scripts
	 */
	
	wp_enqueue_script( 'tatm-site-js', get_template_directory_uri() .'/js/site.js', array('jquery'), '20191102', true );

	/*wp_enqueue_script( 'tatm-bs-util-js', get_template_directory_uri() . '/js/bootstrap/util.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'tatm-bs-collapse-js', get_template_directory_uri() . '/js/bootstrap/collapse.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'tatm-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'tatm-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3.5.7', true );
	*/
}

add_action( 'wp_enqueue_scripts', 'tatm_scripts_styles' );


/**
 * Register sidebars
 */

function tatm_register_sidebars(){
	register_sidebar(
		array(
			'name'          => __( 'After Content', 'tatm' ),
			'id'            => 'content-after',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Hidden', 'tatm' ),
			'id'            => 'sidebar-hidden',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}

add_action( 'widgets_init', 'tatm_register_sidebars' );


/**
 * Add support upload extra file types
 */

function tatm_add_file_types_to_uploads($file_types){
	$new_filetypes = array();

	$new_filetypes['svg'] = 'image/svg+xml';

	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}

function tatm_allow_upload_svg( $type_and_ext, $file, $filename, $mimes ){
	if( '.svg' === strtolower( substr($filename, -4) ) ){
		$filesize = filesize( $file ) / 1024;

		if( $filesize < 50 && current_user_can('manage_options') ){
			$type_and_ext['ext']  = 'svg';
			$type_and_ext['type'] = 'image/svg+xml';
		}
		else {
			$type_and_ext['ext'] = $type_and_ext['type'] = false;
		}
	}

	return $type_and_ext;
}

add_action('upload_mimes', 'tatm_add_file_types_to_uploads');
add_filter('wp_check_filetype_and_ext', 'tatm_allow_upload_svg', 10, 4);


/**
 * ACF
 */

require 'acf/init.php';


/**
 * Template functions
 */

require 'inc/template-functions.php';


/**
 * Customizer
 */

require 'inc/customizer.php';


/**
 * Shortcodes
 */

require 'inc/shortcodes.php';
