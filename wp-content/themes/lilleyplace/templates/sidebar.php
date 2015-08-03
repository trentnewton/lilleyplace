<?php
/*
Template Name: Sidebar
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<div role="main" <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<?php do_action( 'lilleyplace_before_content' ); ?>
        <article class="columns medium-8">
        	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('site_breadcrumbs')) site_breadcrumbs(); ?>
			</nav>
			<?php } ?>
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
				<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( '', array('class' => 'th mar-b-30') ); ?>
				<?php endif; ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</article>
		<?php do_action( 'lilleyplace_after_content' ); ?>
		<?php get_sidebar(); ?>
	</div>
	<div class="shadow white-top"></div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>