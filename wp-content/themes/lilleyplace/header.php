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
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114.png">
	    <meta name="msapplication-TileColor" content="#ffffff">
	    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72.png">
	    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
		<?php wp_head(); ?>
		<script src="//use.typekit.net/glx7jkt.js"></script>
    	<script>try{Typekit.load();}catch(e){}</script>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'lilleyplace_after_body' ); ?>
	<?php get_template_part( 'parts/svg_icons' ); ?>
		<header id="main-nav">
			<div class="row">
				<div id="medium-up-logo" class="columns small-12">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/images/Lilleyplace_Logo.png" width="313" height="121" alt="<?php bloginfo( 'name' ); ?>" /></a>
				</div>
			</div>
			<div class="row">
				<div class="columns small-12">
					<?php get_template_part( 'parts/top-bar' ); ?>
				</div>
			</div>
		</header>
	<?php do_action( 'lilleyplace_layout_start' ); ?>
	<?php do_action( 'lilleyplace_after_header' ); ?>
