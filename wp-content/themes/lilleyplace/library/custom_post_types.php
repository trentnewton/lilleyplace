<?php

// Convert strings to be used as classes

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


// Finds out the name and url of the blog page

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


// Ajax contact form

add_action('comment_post', 'ajaxify_comments',20, 2);
function ajaxify_comments($comment_ID, $comment_status){
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	//If AJAX Request Then
		switch($comment_status){
			case '0':
				//notify moderator of unapproved comment
				wp_notify_moderator($comment_ID);
			case '1': //Approved comment
				echo "success";
				$commentdata=&get_comment($comment_ID, ARRAY_A);
				$post=&get_post($commentdata['comment_post_ID']); 
				wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
			break;
			default:
				echo "error";
		}
		exit;
	}
}

?>