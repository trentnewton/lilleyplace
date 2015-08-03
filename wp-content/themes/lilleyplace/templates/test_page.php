<?php
/*
Template Name: Test Page
*/

get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<main <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>" style="height:600px;background:pink;">
	<article class="entry-content row">
		<div class="column">
			<?php the_content(); ?>
		</div>
	</article>
	<div class="shadow white-top"></div>
</main>
<?php endwhile;?>
<?php get_footer(); ?>
