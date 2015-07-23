<?php

function custom_fields_to_classes( $string ){    
    $string = str_replace(" ","-", trim($string));         
    $string = preg_replace("/[^a-zA-Z0-9-]/","", $string);
    $string = strtolower($string);
    return $string;
}

// Get Relevanssi to display excerpts from your custom fields
add_filter('relevanssi_excerpt_content', 'excerpt_function', 10, 3); function excerpt_function($content, $post, $query) {

global $wpdb; $fields = $wpdb->get_col("SELECT DISTINCT(meta_key) FROM $wpdb->postmeta");

foreach($fields as $key => $field){ $field_value = get_post_meta($post->ID, $field, TRUE); $content .= ' ' . ( is_array($field_value) ? implode(' ', $field_value) : $field_value ); }

// Remove random terms from showing in the search. These are related to the names of the ACF field names
$wordlist = array('acf_id_1', 'acf_id_2', 'acf_id_3', 'acf_id_4');
foreach ($wordlist as &$word) {
    $word = '/\b' . preg_quote($word, '/') . '\b/';
}

$content = preg_replace($wordlist, '', $content);

// The excerpt ready with bits removed from it
return $content; }

if ( ! function_exists( 'lilleyplace_get_posts_page' ) ) :

function lilleyplace_get_posts_page($info) {
	if( get_option('show_on_front') == 'page') {
		$posts_page_id = get_option( 'page_for_posts');
		$posts_page = get_page( $posts_page_id);
		$posts_page_title = $posts_page->post_title;
		$posts_page_url = site_url( get_page_uri( $posts_page_id ) );
	}
	else $posts_page_title = $posts_page_url = '';

	if ($info == 'url') {
		return $posts_page_url;
	} elseif ($info == 'title') {
		return $posts_page_title;
	} else {
		return false;
	}
}
endif;

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    return preg_replace('/<figure>(\s*)(<img .* \/>)(\s*)<\/figure>/iU', '\2', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');

?>