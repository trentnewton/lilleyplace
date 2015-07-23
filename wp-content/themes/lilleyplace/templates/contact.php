<?php
/*
Template Name: Contact
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<div class="row">
	   	<div class="columns">
	   		<?php if (function_exists('sitebreadcrumbs')) sitebreadcrumbs(); ?>
	   	</div>
   	</div>
	<?php } ?>
	<div class="row">
        <div class="columns small-12 medium-8" role="main">
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</div>
		<aside class="columns small-12 medium-4 sidebar-bg">
			<div class="sidebar">
				<?php dynamic_sidebar("Contact Sidebar"); ?>
			</div>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>
