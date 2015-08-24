<?php
/**
 * Clean up WordPress defaults
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'lilleyplace_start_cleanup' ) ) :
function lilleyplace_start_cleanup() {

	// Launching operation cleanup.
	add_action( 'init', 'lilleyplace_cleanup_head' );

	// Remove WP version from RSS.
	add_filter( 'the_generator', 'lilleyplace_remove_rss_version' );

	// Remove pesky injected css for recent comments widget.
	add_filter( 'wp_head', 'lilleyplace_remove_wp_widget_recent_comments_style', 1 );

	// Clean up comment styles in the head.
	add_action( 'wp_head', 'lilleyplace_remove_recent_comments_style', 1 );

	// Clean up gallery output in wp.
	add_filter( 'lilleyplace_gallery_style', 'lilleyplace_gallery_style' );

	// Additional post related cleaning.
	add_filter( 'get_lilleyplace_image_tag_class', 'lilleyplace_image_tag_class', 0, 4 );
	add_filter( 'get_image_tag', 'lilleyplace_image_editor', 0, 4 );
	add_filter( 'the_content', 'img_unautop', 30 );

}
add_action( 'after_setup_theme','lilleyplace_start_cleanup' );
endif;
/**
 * Clean up head.+
 * ----------------------------------------------------------------------------
 */

if ( ! function_exists( 'lilleyplace_cleanup_head' ) ) :
function lilleyplace_cleanup_head() {

	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );

	// Category feed links.
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Post and comment feed links.
	remove_action( 'wp_head', 'feed_links', 2 );

	// Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link.
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Canonical.
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );

	// Shortlink.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Links for adjacent posts.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// WP version.
	remove_action( 'wp_head', 'wp_generator' );

	// Emoji detection script.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	// Emoji styles.
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove WP version from css.
	add_filter( 'style_loader_src', 'lilleyplace_remove_wp_ver_css_js', 9999 );

	// Remove WP version from scripts.
	add_filter( 'script_loader_src', 'lilleyplace_remove_wp_ver_css_js', 9999 );

}
endif;

// Remove WP version from RSS.
if ( ! function_exists( 'lilleyplace_remove_rss_version' ) ) :
function lilleyplace_remove_rss_version() { return ''; }
endif;

if ( ! function_exists( 'lilleyplace_remove_wp_ver_css_js' ) ) :

// Remove WP version from scripts.
function lilleyplace_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src ); }
	return $src;
}
endif;

// Remove injected CSS for recent comments widget.
if ( ! function_exists( 'lilleyplace_remove_wp_widget_recent_comments_style' ) ) :
function lilleyplace_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
	  remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
endif;

// Remove injected CSS from recent comments widget.
if ( ! function_exists( 'lilleyplace_remove_recent_comments_style' ) ) :
function lilleyplace_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) ) {
	remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
endif;

// Remove injected CSS from gallery.
if ( ! function_exists( 'lilleyplace_gallery_style' ) ) :
function lilleyplace_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
endif;

/**
 * Clean up image tags
 * ----------------------------------------------------------------------------
 */

// Remove default inline style of wp-caption.
if ( ! function_exists( 'lilleyplace_fixed_img_caption_shortcode' ) ) :
add_shortcode( 'wp_caption', 'lilleyplace_fixed_img_caption_shortcode' );
add_shortcode( 'caption', 'lilleyplace_fixed_img_caption_shortcode' );
function lilleyplace_fixed_img_caption_shortcode($attr, $content = null) {
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}
	$output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
	if ( '' != $output ) {
		return $output; }
	extract(shortcode_atts(array(
		'id'    => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => '',
		'class'   => '',
	), $attr));
	if ( 1 > (int) $width || empty($caption) ) {
		return $content; }

	$markup = '<figure';
	if ( $id ) { $markup .= ' id="' . esc_attr( $id ) . '"'; }
	if ( $class ) { $markup .= ' class="' . esc_attr( $class ) . '"'; }
	$markup .= '>';
	$markup .= do_shortcode( $content ) . '<figcaption>' . $caption . '</figcaption></figure>';
	return $markup;
}
endif;

// Clean the output of attributes of images in editor.
if ( ! function_exists( 'lilleyplace_image_tag_class' ) ) :
function lilleyplace_image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr( $align );
	return $align;
}
endif;

// Remove width and height in editor, for a better responsive world.
if ( ! function_exists( 'lilleyplace_image_editor' ) ) :
function lilleyplace_image_editor($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i',
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"',
		),
		$html);
}
endif;

// Wrap images with figure tag - Credit: Robert O'Rourke - http://bit.ly/1q0WHFs .
if ( ! function_exists( 'img_unauto' ) ) :
function img_unautop($pee) {
	$pee = preg_replace( '/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '$1', $pee );
	return $pee;
}
endif;

// Remove emojis from the head
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Get the admin bar to work properly on small screen
add_action('wp_head', 'add_header_styles');

function add_header_styles() {
  if ( is_admin_bar_showing() ) {?>
    <style>
		@media screen and (max-width: 600px){
		  #wpadminbar {position: fixed !important; }
		}
    </style>
  <?php }
}

// remove br's and p's from shortcodes
add_filter('the_content', 'shortcode_empty_paragraph_fix');

function shortcode_empty_paragraph_fix($content)
{   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']',
        '<p>      [' => '[',
        '<p>  [' => '['
    );

    $content = strtr($content, $array);

    return $content;
}


/*  Remove Hentry
/* ------------------------------------ */
function remove_hentry( $classes ) {
	if( !is_single() ) {
		$classes = array_diff($classes, array('hentry'));
		return $classes;
	} else {
		return $classes;
	}
}
add_filter( 'post_class', 'remove_hentry' );

// Remove Yoast SEO nag

class ahRemoveYoastNag_Remove_Yoast_SEO_Nag {
	private $yoastPluginFile;
	public function __construct() {
		$this->yoastPluginFile = "wordpress-seo/wp-seo.php";
		register_activation_hook( $this->yoastPluginFile, array( $this, 'ryn_remove_yoast_nag_on_activation' ) );
		add_action( 'upgrader_process_complete', array( $this, 'ryn_remove_yoast_nag_after_update' ), 10, 2 );
	}
	/*	
	 * Check if Yoast has been activated and remove nag
	 */
	function ryn_remove_yoast_nag_on_activation() {
		// If this constant is defined we know Yoast SEO is activated
		if ( defined( 'WPSEO_FILE' ) ) {
			ahRemoveYoastNag_Remove_Yoast_SEO_Nag::ryn_remove_yoast_nag();
		}
	}
	/*	
	 * Remove Yoast nag after plugin has been updated
	 */
	function ryn_remove_yoast_nag_after_update( $upgrader_object, $options ) {
		// Only remove the nag if Yoast SEO has been updated
		if ( array_search( $this->yoastPluginFile, $options['plugins'] ) !==  NULL ) {
			if ( current_user_can( 'manage_options' ) ) {
				ahRemoveYoastNag_Remove_Yoast_SEO_Nag::ryn_remove_yoast_nag();
			}
		}
	}
	/*	
	 * Remove nag for all Admin users
	 */
	private function ryn_remove_yoast_nag() {
		$pluginData = get_plugin_data( WPSEO_FILE, false );
		$pluginVersion = $pluginData['Version'];
		$adminUsers = get_users( array( 'role' => 'administrator' ) );
		// Since the nag displays for all admin users, let's clear it for all admin users
		foreach ( $adminUsers as $user ) {
			if ( get_user_meta( $user->ID, 'wpseo_seen_about_version', true ) !== $pluginVersion ) {
				update_user_meta( $user->ID, 'wpseo_seen_about_version', $pluginVersion );
			}
		}
	}
}
new ahRemoveYoastNag_Remove_Yoast_SEO_Nag();

?>