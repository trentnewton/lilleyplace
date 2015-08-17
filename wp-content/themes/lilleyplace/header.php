<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/touch-icon-iphone-retina.png">
	    <meta name="msapplication-TileColor" content="#ffffff">
	    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
	    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/touch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/touch-icon-ipad-retina.png">
		<?php wp_head(); ?>
		<?php if (get_header_image() != '') {?>
		<style type="text/css">
			.main-hero-inner:after {
				background: url("<?php header_image(); ?>") center no-repeat;
			}
		</style>
		<?php } ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php do_action( 'lilleyplace_after_body' ); ?>
	<?php get_template_part( 'parts/svg_icons' ); ?>
		<header itemscope itemtype="http://schema.org/WPHeader">
			<div id="logo">
				<div class="row">
					<div id="medium-up-logo" class="column">
						<a href="<?php echo home_url(); ?>/">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/images/logo.png" width="400" height="156" alt="<?php bloginfo( 'name' ); ?>" />
						</a>
					</div>
				</div>
			</div>
			<div id="main-nav">
				<div class="row">
					<div class="column">
						<?php get_template_part( 'parts/top-bar' ); ?>
					</div>
				</div>
			</div>
	<?php do_action( 'lilleyplace_layout_start' ); ?>
	<?php do_action( 'lilleyplace_after_header' ); ?>
