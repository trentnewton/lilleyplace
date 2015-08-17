<?php
/*
Template Name: Sitemap Page
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<section role="main" id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?> itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<div class="row">
   		<nav class="column breadcrumbs-container">
			<?php if (function_exists('site_breadcrumbs')) site_breadcrumbs(); ?>
		</nav>
   	</div>
	<?php } ?>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="row">
		<figure class="column">
			<?php the_post_thumbnail( '', array('class' => 'th mar-b-30') ); ?>
		</figure>
	</div>
	<?php endif; ?>
	<?php do_action( 'lilleyplace_before_content' ); ?>
	<article class="entry-content row">
		<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
		<div class="column" itemprop="text">
			<?php the_content(); ?>
			<?php get_template_part('parts/sitemap'); ?>
		</div>
	</article>
	<?php do_action( 'lilleyplace_after_content' ); ?>
	<div class="shadow white-top"></div>
</section>
<?php get_footer(); ?>
