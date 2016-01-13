<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'lilleyplace_scripts' ) ) :
	function lilleyplace_scripts() {

	wp_deregister_style( 'contact-form-7' );

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/assets/css/app.css' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	wp_deregister_script( 'contact-form-7' );

	// do not load the file: wp-embed.min.js (used since WordPress 4.4)

    wp_dequeue_script( 'wp-embed' );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to Gruntfile.js and see lines 67-88.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_register_script( 'app-js', get_template_directory_uri() . '/assets/js/min/app-min.js', array(), '5.5.2', true );

	// Enqueue all registered scripts.
	wp_enqueue_script( 'fastclick' );
	wp_enqueue_script( 'app-js' );

	}

	add_action( 'wp_enqueue_scripts', 'lilleyplace_scripts' );
endif;

?>