<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<main class="page-content">
	<div class="row">
		<div class="columns medium-8">
			<?php do_action( 'lilleyplace_before_content' ); ?>
			<?php get_search_form(); ?>
			<p><?php _e( 'Search Results for', 'lilleyplace' ); ?>&nbsp;<strong><?php echo get_search_query(); ?></strong></p>
			<ul class="results">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'parts/content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'parts/content', 'none' ); ?>

				<?php endif;?>
				<?php do_action( 'lilleyplace_before_pagination' ); ?>

				<?php if ( function_exists( 'lilleyplace_pagination' ) ) { lilleyplace_pagination(); } else if ( is_paged() ) { ?>

					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'lilleyplace' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'lilleyplace' ) ); ?></div>
					</nav>
				<?php } ?>
			</ul>
			<?php do_action( 'lilleyplace_after_content' ); ?>
		</div>
		<aside class="columns medium-4 sidebar-bg">
			<div class="sidebar">
				<?php dynamic_sidebar("Search Sidebar"); ?>
			</div>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</main>
<?php get_footer(); ?>