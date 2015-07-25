<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<section class="page-content">
	<div class="row">
		<div class="columns small-12 medium-8" role="main">
			<nav class="breadcrumbs-container">
				<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
			</nav>
		<?php do_action( 'lilleyplace_before_content' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('entry-content') ?> id="post-<?php the_ID(); ?>">
					<header class="mar-b-30">
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php lilleyplace_entry_meta(); ?>
					</header>
					<?php do_action( 'lilleyplace_post_before_entry_content' ); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="row">
							<div class="column mar-b-30">
								<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php the_content(); ?>
				</article>
				<footer>
					<?php wp_link_pages(); ?>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'lilleyplace' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action( 'lilleyplace_post_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'lilleyplace_post_after_comments' ); ?>
		<?php endwhile;?>
		<?php do_action( 'lilleyplace_after_content' ); ?>
		</div>
		<aside class="columns small-12 medium-4 sidebar-bg">
			<div class="sidebar">
				<?php dynamic_sidebar("Blog Sidebar"); ?>
			</div>
		</aside>
	</div>
  <div class="shadow white-top"></div>
</section>
<?php get_footer(); ?>