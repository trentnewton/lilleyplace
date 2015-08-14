<?php
/*
Template Name: Resources
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<section role="main" id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?>>
	<div class="row">
		<?php do_action( 'lilleyplace_before_content' ); ?>
        <article class="columns medium-8 mar-b-30">
        	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('site_breadcrumbs')) site_breadcrumbs(); ?>
			</nav>
			<?php } ?>
			<?php if ( has_post_thumbnail() ) : ?>
			<figure>
				<?php the_post_thumbnail( '', array('class' => 'th mar-b-30') ); ?>
			</figure>
			<?php endif; ?>
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</article>
		<?php do_action( 'lilleyplace_after_content' ); ?>
		<aside class="columns medium-4">
			<?php dynamic_sidebar("Resources Sidebar"); ?>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>