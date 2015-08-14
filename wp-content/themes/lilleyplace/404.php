<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<section role="main" id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?>>
	<div class="row four-o-four-container">
		<section class="columns medium-6 four-o-four-item">
			<h2 class="four-o-four-text" title="404">404</h2>
		</section>
		<aside class="columns medium-6 sidebar-bg">
			<div class="sidebar-container">
				<div class="sidebar">
					<p><strong><?php _e( 'Oops! the page you are looking for could not be found.', 'lilleyplace' ); ?></strong></p>
					<p><?php _e( 'Here are some links that you might find useful:', 'lilleyplace' ); ?></p>		
				</div>
			</div>
		</aside>
	</div>
	<article class="row">
		<div class="column">
			<hr>
			<?php get_template_part('parts/sitemap'); ?>
		</div>
	</article>
  <div class="shadow white-top"></div>
</section>
<?php get_footer(); ?>
