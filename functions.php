<?php

/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/

//FROM PRONTO

//main pronto functions
require('functions/functions-p.php');
//other pronto functions
require('admin/theme-admin.php');
require('functions/pagination.php');
require('functions/better-excerpts.php');
require('functions/shortcodes.php');
require('functions/flickr-widget.php');

//FROM FOUNDATION
require('functions/functions-f.php');


//All enqueuing in one big function


function all_scripts_style() {

	if (!is_admin()) {
	
	//get theme options
	global $options;
	
		//Load jquery
		wp_enqueue_script('jquery');
		
		// Pronto's JS (for masonry)
		wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
		wp_enqueue_script('masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js');
		wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');

		// JS for foundation
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array(), '1.0', false );
		wp_enqueue_script( 'app', get_template_directory_uri().'/javascripts/app.js', array('foundation'), '1.0', false );
		wp_enqueue_script( 'orbit', get_template_directory_uri().'/javascripts/orbit.js', array('foundation'), '1.0', true );
		// style for foundation
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/stylesheets/foundation.min.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array('foundation') );

		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	
	}

}
add_action( 'wp_enqueue_scripts', 'all_scripts_style' );



function my_theme_scripts_function() {
}

/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/
// Support for Featured Images
	add_theme_support( 'post-thumbnails' ); 

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-size',  9999, 9999, false );
	add_image_size( 'post-thumb',  235, 180, true );
	add_image_size( 'post-full',  600, 9999, false );

function after_setup_theme(){ 
			// Adds support for featured images and register some default image sizes
			add_theme_support( 'post-thumbnails' ); 
			add_image_size( 'orbit-slide', 540, 450, true ); 
			add_image_size( 'orbit-slide-small', 100, 83, true ); 
		}



?>