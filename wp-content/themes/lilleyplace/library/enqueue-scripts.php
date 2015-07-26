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
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/stylesheets/app.css' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	wp_deregister_script( 'contact-form-7' );

	// Modernizr is used for polyfills and feature detection. Must be placed in header. (Not required).
	wp_register_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3', true );

	// Fastclick removes the 300ms delay on click events in mobile environments. Must be placed in header. (Not required).
	wp_register_script( 'fastclick', '//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js', array(), '1.0.6', false );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '2.1.4', true );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to Gruntfile.js and see lines 67-88.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_register_script( 'app-js', get_template_directory_uri() . '/js/min/app-min.js', array('jquery'), '5.5.2', true );

	// Enqueue all registered scripts.
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'fastclick' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'app-js' );

	}

	add_action( 'wp_enqueue_scripts', 'lilleyplace_scripts' );
endif;

?>