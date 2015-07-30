<?php
/*
Template Name: Contact
*/
get_header(); ?>
<?php do_action( 'lilleyplace_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<main <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
        <article class="columns medium-8" role="main">
        	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
		   	<header>
		   		<nav class="breadcrumbs-container">
					<?php if (function_exists('sitebreadcrumbs')) sitebreadcrumbs(); ?>
				</nav>
		   	</header>
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
		<aside class="columns medium-4 sidebar-bg">
			<div class="sidebar">
				<?php dynamic_sidebar("Contact Sidebar"); ?>
			</div>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</main>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>
