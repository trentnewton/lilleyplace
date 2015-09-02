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
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	    <meta name="msapplication-TileColor" content="#ffffff">
	    <meta name="theme-color" content="#8F4EC2">
	    <link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
	<?php get_template_part( 'parts/facebook_app' ); ?>
	<?php do_action( 'lilleyplace_after_body' ); ?>
	<?php get_template_part( 'parts/svg_icons' ); ?>
		<!--[if lte IE 9]><p class="old-browser-notice">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site.</p><![endif]-->
		<header itemscope itemtype="http://schema.org/WPHeader">
			<div id="logo">
				<div class="row">
					<div id="medium-up-logo" class="column">
						<a href="<?php echo home_url(); ?>/">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/images/logo.png" width="400" height="156" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
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
