<?php
/*
Template Name: Contact
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?> itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
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
				<div class="entry-content" itemprop="text">
					<?php the_content(); ?>
				</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</article>
		<?php do_action( 'lilleyplace_after_content' ); ?>
		<aside class="columns medium-4 sidebar-bg" itemscope itemtype="http://schema.org/WPSideBar">
			<div class="sidebar">
				<?php dynamic_sidebar("Contact Sidebar"); ?>
			</div>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</main>
<?php endwhile;?>
<?php get_footer(); ?>
