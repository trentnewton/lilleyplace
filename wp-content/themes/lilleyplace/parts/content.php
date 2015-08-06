<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<?php if ( 'post' == get_post_type() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-description'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
<?php else : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-description'); ?>>	
<?php endif; ?>
	<header class="mar-b-15">
		<h4 class="content-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h4>
		<?php if ( 'post' == get_post_type() ) : ?>
			<span class="date entry-meta">
				<svg class="icon icon-calendar"><use xlink:href="#icon-calendar"></use></svg>&nbsp;<?php the_time( get_option( 'date_format' ) ); ?>
			</span>
		<?php endif; ?>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="row">
		<figure class="column">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array('class' => 'th') ); ?></a>
		</figure>
	</div>
	<?php endif; ?>
	<div class="post-description-copy">
		<?php the_excerpt(); ?>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
<hr>