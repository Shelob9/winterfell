<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */
$options = get_option( 'Pronto_theme_settings' );
?>
<!DOCTYPE html>

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>
<!-- Design by AJ Clarke (http://www.wpexplorer.com) - Powered by WordPress (http://wordpress.org) -->

<!-- BEGIN head -->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
<!-- Stylesheet & Favicon -->
<?php if($options['favicon'] !='') { ?>
<link rel="icon" type="image/png" href="<?php echo $options['favicon']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<!-- WP Head -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php if(!empty($options['notification'])) { ?>
<div id="notifications">
    <div id="notifications-inner">
		<?php echo stripslashes($options['notification']); ?>
    </div>
    <!-- /notifications-exit -->  
</div>
<!-- /notifications -->
<?php } ?>

<div id="wrap" class="clearfix">

<?php get_sidebar(' '); ?>