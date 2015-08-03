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
<div role="main" <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="four-o-four-container">
			<article class="columns medium-6 four-o-four-item">
				<h2 class="four-o-four-text" title="404">404</h2>
			</article>
			<aside class="columns medium-6 sidebar-bg">
				<div class="sidebar-container">
					<div class="sidebar">
						<p><strong><?php _e( 'Oops! the page you are looking for could not be found.', 'lilleyplace' ); ?></strong></p>
						<p><?php _e( 'Here are some links that you might find useful:', 'lilleyplace' ); ?></p>
						<ul>
							<li><?php printf( __( '<a href="%s">Home</a>', 'lilleyplace' ), home_url() ); ?></li>
							<li><a href="<?php printf( home_url('contact') ); ?>"><?php _e( 'Contact Us', 'lilleyplace' ); ?></a></li>
						</ul>
					</div>
				</div>
			</aside>
		</div>
	</div>
  <div class="shadow white-top"></div>
</div>
<?php get_footer(); ?>
