<?php

/*-----------------------------------------------------------------------------------*/
/*	Include Additional Functions Files
/*-----------------------------------------------------------------------------------*/

    
//pagination
	if( file_exists(get_template_directory().'/inc/pagination.php') )
		include_once(get_template_directory().'/inc/pagination.php');
		
//Functions for commenting		
	if( file_exists(get_template_directory().'/inc/comments-function.php') )
		include_once(get_template_directory().'/inc/comments-function.php');
		
//shortcodes
	if( file_exists(get_template_directory() . '/inc/shortcodes.php' ) )
		include_once(get_template_directory() . '/inc/shortcodes.php' );




/*-----------------------------------------------------------------------------------*/
/*	Foundation Setup
/*-----------------------------------------------------------------------------------*/
/*		1. Scripts, Styles 2. Setup Framework 3. Sidebars/ Widgets 4. Other Fixes
/*-----------------------------------------------------------------------------------*/
/**
 * 1. Enqueue all scripts and styles
 */
	function wf_all_scripts_style() {

		
		//Load jquery
			wp_enqueue_script('jquery');
		// style for foundation
			wp_enqueue_style( 'foundation', get_template_directory_uri().'/stylesheets/foundation.min.css' );
			wp_enqueue_style( 'app', get_template_directory_uri(), array('foundation') );
			// JS for foundation
			wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array(), '1.0', false );
			wp_enqueue_script( 'app', get_template_directory_uri().'/javascripts/app.js', array('foundation'), '1.0', false );
		//style/JS for navigation
			wp_enqueue_script ('nav', get_template_directory_uri().'/javascripts/nav.js', array('jquery') );
			wp_enqueue_style ('nav-style', get_template_directory_uri().'/stylesheets/nav-style.css');
		//MASONRY
			wp_enqueue_script('masonry', get_template_directory_uri() . '/javascripts/jquery.masonry.min.js');
			wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/javascripts/custom.js');
		
		
		
	}
	add_action( 'wp_enqueue_scripts', 'wf_all_scripts_style' );
/**
 * 2. Theme Setup
 */

    
	function foundation_setup() {

	// Language Translations
		load_theme_textdomain( 'foundation', get_template_directory() . '/languages' );

	// Custom Editor Style Support
		add_editor_style();

	

	// Automatic Feed Links & Post Formats
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// Custom Background
		add_theme_support( 'custom-background', array(
			'default-color' => 'FFFFFF',
		) );

	}
	add_action( 'after_setup_theme', 'foundation_setup' );


/**
 * 3. Sidebars/ Widgets
 */

	function foundation_widgets() {
//Main sidebar
	// Sidebar Right
		register_sidebar( array(
				'id' => 'foundation_sidebar_right',
				'name' => __( 'Sidebar Right', 'foundation' ),
				'description' => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
				'before_widget' => '<div class="panel radius">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );
//Main Footer Sidebar
	// Sidebar Footer Column One
		register_sidebar( array(
				'id' => 'foundation_sidebar_footer_one',
				'name' => __( 'Sidebar Footer One', 'foundation' ),
				'description' => __( 'This sidebar is located in column one of your theme footer.', 'foundation' ),
				'before_widget' => '<div id="footer-sidebar">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

	// Sidebar Footer Column Two
		register_sidebar( array(
				'id' => 'foundation_sidebar_footer_two',
				'name' => __( 'Sidebar Footer Two', 'foundation' ),
				'description' => __( 'This sidebar is located in column two of your theme footer.', 'foundation' ),
				'before_widget' => '<div id="footer-sidebar">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

	// Sidebar Footer Column Three
			register_sidebar( array(
				'id' => 'foundation_sidebar_footer_three',
				'name' => __( 'Sidebar Footer Three', 'foundation' ),
				'description' => __( 'This sidebar is located in column three of your theme footer.', 'foundation' ),
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

	// Sidebar Footer Column Four
			register_sidebar( array(
				'id' => 'foundation_sidebar_footer_four',
				'name' => __( 'Sidebar Footer Four', 'foundation' ),
				'description' => __( 'This sidebar is located in column four of your theme footer.', 'foundation' ),
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );
		}

	add_action( 'widgets_init', 'foundation_widgets' );

/**
 * 4. Other Fixes
 */
 
//HTML5 IE Shim
	function foundation_shim () {
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<![endif]-->';
	}

	add_action('wp_head', 'foundation_shim');

// Custom Avatar Classes
	function foundation_avatar_css($class) {
		$class = str_replace("class='avatar", "class='author_gravatar left ", $class) ;
		return $class;
	}

	add_filter('get_avatar','foundation_avatar_css');

// Custom Post Excerpt
	function wf_new_excerpt_more($more) {
		global $post;
		return '... <br><br><a class="small button secondary" href="'. get_permalink($post->ID) . '">Continue Reading</a>';
	}
	add_filter('excerpt_more', 'wf_new_excerpt_more');

// Limit Post Word Count
	function wf_new_excerpt_length($length) {
		return 50;
	}
	add_filter('excerpt_length', 'wf_new_excerpt_length');

// add home link to menu
	function wf_home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'wf_home_page_menu_args' );
// Better Excerpts
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
		}
	 
		function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
		$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
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
//for slider
	add_image_size( 'wpf-featured', 639, 300, true );
	add_image_size ( 'wpf-home-featured', 970, 364, true );
	}
// Adds support for featured images and register some default image sizes
	function after_setup_theme(){ 	
			add_theme_support( 'post-thumbnails' ); 
			add_image_size( 'orbit-slide', 540, 450, true ); 
			add_image_size( 'orbit-slide-small', 100, 83, true ); 
	}
/*-----------------------------------------------------------------------------------*/
/*	The Others
/*-----------------------------------------------------------------------------------*/
//Dynamic Copyright For Footer
//http://www.wpbeginner.com/wp-tutorials/how-to-add-a-dynamic-copyright-date-in-wordpress-footer/
	function wf_copyright() {
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
/*	MENU
/*-----------------------------------------------------------------------------------*/
function wf_register_my_menus() {
  register_nav_menus(
  	array( 'theme_location' => 'Main Menu', 'container_class' => 'menu-main-menu-container' )
  );
}
add_action( 'init', 'wf_register_my_menus' );
?>