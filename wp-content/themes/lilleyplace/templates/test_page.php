<?php
/*
Template Name: Test Page
*/

get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<main <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>" style="height:600px;background:pink;">
	<div class="footer-display">
				<div class="row">
					<div class="footer-content">
						<div class="medium-5 large-6 columns">
							<?php dynamic_sidebar("First Footer Column"); ?>
						</div>
						<div class="medium-5 large-4 columns">
							<?php dynamic_sidebar("Second Footer Column"); ?>
						</div>
						<div class="medium-2 columns">
							<?php dynamic_sidebar("Third Footer Column"); ?>
						</div>
					</div>
				</div>
</main>
<?php endwhile;?>
<?php get_footer(); ?>
