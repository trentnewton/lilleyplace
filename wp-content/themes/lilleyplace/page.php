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
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<main <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<header class="row">
	   	<div class="column">
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('sitebreadcrumbs')) sitebreadcrumbs(); ?>
			</nav>
	   	</div>
   	</header>
	<?php } ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( '', array('class' => 'th mar-b-30') ); ?>
	<?php endif; ?>
	<?php do_action( 'lilleyplace_before_content' ); ?>
	<article class="entry-content row">
		<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
		<div class="column">
			<?php the_content(); ?>
		</div>
	</article>
	<?php do_action( 'lilleyplace_after_content' ); ?>
	<div class="shadow white-top"></div>
</main>
<?php endwhile;?>
<?php get_footer(); ?>
