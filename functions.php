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
if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


/*-----------------------------------------------------------------------------------*/
/*	OPTIONS PAGE
/*-----------------------------------------------------------------------------------*/
/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/* 
 * Temporary notice, will be removed once file uploader
 * is stable
 
function optionsframework_admin_notice(){
    echo '<div class="updated">
       <p>Options Framework Development Version: Help test the <a href="https://github.com/devinsays/options-framework-plugin/issues/135#issuecomment-12031802">new file uploader</a></p>
    </div>';
}

add_action( 'admin_notices', 'optionsframework_admin_notice' );

 */
?>
