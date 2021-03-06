<?php
/*
Template Name: Index Staff
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?> itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
<?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order ASC", 'OBJECT'); ?>
	<div class="row">
		<?php do_action( 'lilleyplace_before_content' ); ?>
		<article class="column text-center">
		<?php if($content = $post->post_content ) {
			echo "<h4 class=\"mar-b-30\" itemprop=\"headline\">";
					echo get_the_content();
			echo "</h4>";
		} ?>
			<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
			<p class="no-space">
				<a href="<?php echo get_permalink($pageChild->ID); ?>" title="<?php echo $pageChild->post_title; ?>" class="button"><?php if( get_field('index_button_pre_text') ): ?><?php the_field('index_button_pre_text'); ?>&nbsp;<?php endif; ?><?php echo $pageChild->post_title; ?>&nbsp;&#x279C;
				</a>
			</p>
			<?php endforeach; endif;?>
		</article>
		<?php do_action( 'lilleyplace_after_content' ); ?>
	</div>
	<div class="shadow white-top"></div>
</main>
<?php endwhile;?>
<?php get_footer(); ?>