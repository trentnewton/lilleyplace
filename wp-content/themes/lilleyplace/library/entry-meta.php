<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'lilleyplace_entry_meta' ) ) :
	function lilleyplace_entry_meta() {
		echo '
		<span class="date">
			<time class="updated" datetime="'. get_the_time( 'c' ) .'" itemprop="datePublished"><svg class="icon icon-calendar"><use xlink:href="#icon-calendar"></use></svg>&nbsp;'. sprintf( get_the_date(), get_the_time() ) .'</time>
		</span>';
		echo '
		<span class="date byline author" itemprop="author" itemscope itemptype="http://schema.org/Person">
			<svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>&nbsp;<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author" class="fn" itemprop="url">'. get_the_author_meta('first_name') .'&nbsp;'. get_the_author_meta('last_name') .'</a>
		</span>';
	}
endif;
?>