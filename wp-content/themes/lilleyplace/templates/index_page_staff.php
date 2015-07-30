<?php
/*
Template Name: Index Staff
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<?php get_template_part( 'parts/banner' ); ?>
	<section class="page-content">
	<?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order DESC", 'OBJECT'); ?>
		<div class="row">
			<div class="columns text-center">
			<?php if($content = $post->post_content ) {
				echo "<h4 class=\"mar-b-30\">";
						echo get_the_content();
				echo "</h4>";
			} ?>
				<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
				<p class="no-space">
					<a href="<?php echo get_permalink($pageChild->ID); ?>" title="<?php echo $pageChild->post_title; ?>" class="button"><?php if( get_field('index_button_pre_text') ): ?><?php the_field('index_button_pre_text'); ?>&nbsp;<?php endif; ?><?php echo $pageChild->post_title; ?>&nbsp;&#x279C;
					</a>
				</p>
				<?php endforeach; endif;?>
			</div>
		</div>
		<div class="shadow white-top"></div>
	</section>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>