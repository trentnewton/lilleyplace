<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'lilleyplace_theme_support' ) ) :
function lilleyplace_theme_support() {
	// Add language support
	load_theme_textdomain( 'lilleyplace', get_template_directory() . '/languages' );

	// Add menu support
	add_theme_support( 'menus' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// RSS thingy
	add_theme_support( 'automatic-feed-links' );

	// Add post formarts support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	// Add the Wordpress Link Manager
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );

	// Add custom background to Customizer
	add_theme_support( 'custom-background', $args );

	// Display the full TinyMCE text editor
	function enable_more_buttons($buttons) {

	$buttons[] = 'styleselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'newdocument';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'charmap';
	$buttons[] = 'visualaid';

	return $buttons;
	}

	add_filter("mce_buttons_3", "enable_more_buttons");

}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1024;
}

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function theme_customiser( $wp_customize ) {
    $wp_customize->add_section(
        'section_one',
        array(
            'title' => 'Footer',
            'description' => __( 'Change the text of the footer.', 'lilleyplace' ),
            'priority' => 999,
        )
    );

    $wp_customize->add_setting(
	    'copyright_textbox',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);

	$wp_customize->add_control(
	    'copyright_textbox',
	    array(
	        'label' => __( 'Copyright Text (will override the default text)', 'lilleyplace' ),
	        'section' => 'section_one',
	        'type' => 'text',
	    )
	);
}

add_action( 'customize_register', 'theme_customiser' );

add_action( 'after_setup_theme', 'lilleyplace_theme_support' );
endif;
?>