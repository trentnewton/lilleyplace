<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
<?php do_action( 'lilleyplace_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<div class="row">
	   	<div class="columns">
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('sitebreadcrumbs')) sitebreadcrumbs(); ?>
			</nav>
	   	</div>
   	</div>
	<?php } ?>
<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
	<div class="entry-content">
		<div class="row">
			<div class="columns small-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
  <div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>
