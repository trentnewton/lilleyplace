<?php
/*
Template Name: Sidebar
*/
get_header(); ?>
<?php do_action( 'lilleyplace_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
        <div class="columns medium-8" role="main">
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
	<div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>
