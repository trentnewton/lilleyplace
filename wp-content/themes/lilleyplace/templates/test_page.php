<?php
/*
Template Name: Test
*/

get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<div <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<div class="row">
	   	<div class="column">
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('site_breadcrumbs')) site_breadcrumbs(); ?>
			</nav>
	   	</div>
   	</div>
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
</div>
<?php endwhile;?>
<?php get_footer(); ?>
