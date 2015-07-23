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
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="four-o-four-container">
			<div class="columns small-12 medium-6">
				<div class="four-o-four-item">
					<h2 class="four-o-four-text" title="404">404</h2>
				</div>
			</div>
			<aside class="columns small-12 medium-6 sidebar-bg">
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
</article>
<?php get_footer(); ?>
