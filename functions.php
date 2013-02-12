<?php

/*-----------------------------------------------------------------------------------*/
/*	Include Additional Functions Files
/*-----------------------------------------------------------------------------------*/
//theme options
	if( file_exists(get_template_directory().'/inc/theme-options.php') )
    include_once(get_template_directory().'/inc/theme-options.php');
    
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
	function new_excerpt_more($more) {
		global $post;
		return '... <br><br><a class="small button secondary" href="'. get_permalink($post->ID) . '">Continue Reading</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

// Limit Post Word Count
	function new_excerpt_length($length) {
		return 50;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

// add home link to menu
	function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
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
/*	MENU
/*-----------------------------------------------------------------------------------*/
//Menu scheme lifted from https://github.com/wearerequired/required-foundation/


// Register two menus
	add_theme_support('menus');

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'requiredfoundation' ),
		'secondary' => __( 'Secondary Menu', 'requiredfoundation' )
	) );


/**
 * class required_walker
 *
 * Custom output to enable the the ZURB Navigation style.
 * Courtesy of Kriesi.at. http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output
 *
 * @since  required+ Foundation 0.1.0
 *
 * @return string the code of the full navigation menu
 */
	class REQ_Foundation_Walker extends Walker_Nav_Menu {

		/**
		 * Specify the item type to allow different walkers
		 * @var array
		 */
		var $nav_bar = '';

		function __construct( $nav_args = '' ) {

			$defaults = array(
				'item_type' => 'li',
				'in_top_bar' => false,
			);
			$this->nav_bar = apply_filters( 'req_nav_args', wp_parse_args( $nav_args, $defaults ) );
		}

		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			// Check for flyout
			$flyout_toggle = '';
			if ( $args->has_children && $this->nav_bar['item_type'] == 'li' ) {

				if ( $depth == 0 && $this->nav_bar['in_top_bar'] == false ) {

					$classes[] = 'has-flyout';
					$flyout_toggle = '<a href="#" class="flyout-toggle"><span></span></a>';

				} else if ( $this->nav_bar['in_top_bar'] == true ) {

					$classes[] = 'has-dropdown';
					$flyout_toggle = '';
				}

			}

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			if ( $depth > 0 ) {
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			} else {
				$output .= $indent . ( $this->nav_bar['in_top_bar'] == true ? '<li class="divider"></li>' : '' ) . '<' . $this->nav_bar['item_type'] . ' id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			}

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


			$item_output  = $args->before;
			$item_output .= '<a '. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $flyout_toggle; // Add possible flyout toggle
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function end_el( &$output, $item, $depth = 0, $args = array() ) {

			if ( $depth > 0 ) {
				$output .= "</li>\n";
			} else {
				$output .= "</" . $this->nav_bar['item_type'] . ">\n";
			}
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {

			if ( $depth == 0 && $this->nav_bar['item_type'] == 'li' ) {
				$indent = str_repeat("\t", 1);
				$output .= $this->nav_bar['in_top_bar'] == true ? "\n$indent<ul class=\"dropdown\">\n" : "\n$indent<ul class=\"flyout\">\n";
			} else {
				$indent = str_repeat("\t", $depth);
				$output .= $this->nav_bar['in_top_bar'] == true ? "\n$indent<ul class=\"dropdown\">\n" : "\n$indent<ul class=\"level-$depth\">\n";
			}
		}
	}

// Yes you can overwrite the whole function
	if ( ! function_exists( 'required_side_nav' ) ) :
/**
 * Displays a simple subnav with child pages of the current
 * or page above. See usage in page-templates/left-nav-page.php
 *
 * @param  integer $depth  		Levels of child pages to show, default is 1
 * @param  string  $before 		List to start the nav, you could use something like <ul class="nav-bar vertical">
 * @param  string  $after 		Closing </ul>
 * @param  bool    $show_home	Show a home link? Default: false
 * @param  string  $item_type	Usually an li, if not we use dd for you buddy!
 * @return string  Echo out the whole navigation
 *
 * @since required+ Foundation 0.5.0
 */
	function required_side_nav( $nav_args = '' ) {

		global $post;

		$defaults = array(
			'show_home' => false,
			'depth'		=> 1,
			'before'	=> '<ul class="side-nav">',
			'after'		=> '</ul>',
			'item_type' => 'li',
		);

		$nav_args = apply_filters( 'req_side_nav_args', wp_parse_args( $nav_args, $defaults ) );

		$args = array(
			'title_li' 		=> '',
			'depth'			=> $nav_args['depth'],
			'sort_column'	=> 'menu_order',
			'echo'			=> 0,
		);

		// Make sure the dl only shows 1 level
		if ( $nav_args['item_type'] != 'li' ) {
			$args['depth'] = 0;
		}

		if ( $post->post_parent ) {
			// So we have a post parent
			$args['child_of'] = $post->post_parent;
		} else {
			// So we don't have a post parent, so you are!
			$args['child_of'] = $post->ID;
		}

		// Filter the $args if you want to do something different!
		$children = wp_list_pages( $args );

		// Point as back home or not?
		if ( $nav_args['show_home'] == true ) {
			$nav_args['before'] .= '<li><a href="' . get_home_url() . '">' . __( '&larr; Home', 'requiredfoundation' ) . '</a></li><li class="divider"></li>';
		}

		// Do we have children?
		if ( $children ) {

			$output = $nav_args['before'] . $children . $nav_args['after'];


			// Replace the output if we are on a definition list
			if ( $nav_args['item_type'] != 'li' ) {

				$pattern_start = '/<li/';
				$pattern_end = '/<\/li>/';

				$replace_start = '<dd';
				$replace_end = '</dd>';

				$output = preg_replace($pattern_start, $replace_start, $output);
				$output = preg_replace($pattern_end, $replace_end, $output);
			}

			echo $output;
		}
	}
	endif;

 
?>
