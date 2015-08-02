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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-description">
		<header class="mar-b-15">
			<h4 class="content-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h4>
			<?php if ( 'post' == get_post_type() ) : ?>
				<time class="date entry-meta">
					<svg class="icon icon-calendar"><use xlink:href="#icon-calendar"></use></svg>&nbsp;<?php the_time( get_option( 'date_format' ) ); ?>
				</time>
			<?php endif; ?>
		</header>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="row">
			<div class="column">
				<figure>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array('class' => 'th') ); ?></a>
				</figure>
			</div>
		</div>
		<?php endif; ?>
		<div class="post-description-copy">
			<?php the_excerpt(); ?>
		</div>
		<footer>
			<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
	</div>
	<hr>
</article>