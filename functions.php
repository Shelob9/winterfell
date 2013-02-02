<?php

/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/

//FROM PRONTO

//main pronto functions
require('functions/functions-p.php');
//other pronto functions

require('functions/pagination.php');
require('functions/better-excerpts.php');



//FROM FOUNDATION
require('functions/functions-f.php');
// NHP THEME OPTIONS
//http://leemason.github.com/NHP-Theme-Options-Framework/
get_template_part('nhp', 'options');

//All enqueuing in one big function


function all_scripts_style() {

	if (!is_admin()) {
	
	//get theme options
	global $options;
	
		//Load jquery
		wp_enqueue_script('jquery');
		
		//MASONRY
		
		wp_enqueue_script('masonry', get_template_directory_uri() . '/javascripts/jquery.masonry.min.js');
		wp_enqueue_script('custom', get_template_directory_uri() . '/javascripts/custom.js');
		

		// JS for foundation
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array(), '1.0', false );
		wp_enqueue_script( 'app', get_template_directory_uri().'/javascripts/app.js', array('foundation'), '1.0', false );
	
		
		
		// style for foundation
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/stylesheets/foundation.min.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array('foundation') );
		//style for social webicons
		wp_enqueue_style( 'webicons', get_template_directory_uri().'/stylesheets/fc-webicons.css' );

		
		// flexslider
		if(is_home()) {
		wp_enqueue_script('flexslider', get_template_directory_uri().'/javascripts/jquery.flexslider-min.js', array('jquery'));
    	wp_enqueue_script('flexslider-init', get_template_directory_uri().'/javascripts/flexslider-init.js', array('jquery', 'flexslider'));
		wp_enqueue_style('flexslider', get_template_directory_uri().'/stylesheets/flexslider.css');
		}
}
	}


add_action( 'wp_head', 'all_scripts_style' );



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
	//for orbit
	add_image_size( 'wpf-featured', 639, 300, true );
	add_image_size ( 'wpf-home-featured', 970, 364, true );

	}

function after_setup_theme(){ 
			// Adds support for featured images and register some default image sizes
			add_theme_support( 'post-thumbnails' ); 
			add_image_size( 'orbit-slide', 540, 450, true ); 
			add_image_size( 'orbit-slide-small', 100, 83, true ); 
		}
/*-----------------------------------------------------------------------------------*/
/*	The Others
/*-----------------------------------------------------------------------------------*/
//Dynamic Copyright For Footer
//http://www.wpbeginner.com/wp-tutorials/how-to-add-a-dynamic-copyright-date-in-wordpress-footer/
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}



/*-----------------------------------------------------------------------------------*/
/*	OPTIONS PAGE
/*-----------------------------------------------------------------------------------*/

  if( file_exists(get_template_directory().'/theme-options.php') )
    include_once(get_template_directory().'/theme-options.php');
 
?>
