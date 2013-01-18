<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
*/


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) 
    $content_width = 620;



/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/
require('admin/theme-admin.php');
require('functions/pagination.php');
require('functions/better-excerpts.php');
require('functions/shortcodes.php');
require('functions/flickr-widget.php');



/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-size',  9999, 9999, false );
	add_image_size( 'post-thumb',  235, 180, true );
	add_image_size( 'post-full',  600, 9999, false );



/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	//get theme options
	global $options;
	
	wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"), false, '1.6'); 
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
	wp_enqueue_script('masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js');
	wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
}



/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

//Register Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));


/*-----------------------------------------------------------------------------------*/
/*	Other functions
/*-----------------------------------------------------------------------------------*/

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
}

// register navigation menus
register_nav_menus(
	array(
	'menu'=>__('Menu'),
	)
);

/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}


// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}
?>