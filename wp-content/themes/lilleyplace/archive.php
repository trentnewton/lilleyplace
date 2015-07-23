<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<section class="page-content">
	<div class="entry-content">
		<div class="row">
			<div class="columns small-12 medium-8" role="main">
				<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; // End have_posts() check. ?>

					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php if ( function_exists( 'lilleyplace_pagination' ) ) { lilleyplace_pagination(); } else if ( is_paged() ) { ?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'lilleyplace' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'lilleyplace' ) ); ?></div>
						</nav>
				<?php } ?>
			</div>
			<aside class="columns small-12 medium-4 sidebar-bg">
				<div class="sidebar">
					<?php dynamic_sidebar("Blog Sidebar"); ?>
				</div>
			</aside>
		</div>
	</div>
  <div class="shadow white-top"></div>
</section>
<?php get_footer(); ?>
