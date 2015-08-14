<?php
/*
Template Name: Index
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<section role="main" id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?>>
<?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order ASC", 'OBJECT'); ?>
	<div class="row">
		<div class="column">
		<?php if($content = $post->post_content ) {
			echo "<h4 class=\"mar-b-30\">";
					echo get_the_content();
			echo "</h4>";
		} ?>
			<?php do_action( 'lilleyplace_before_content' ); ?>
			<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
			<article id="post-<?php echo $pageChild->ID; ?>" class="post-description">
				<header class="mar-b-15">
					<h4 class="content-title">
						<a href="<?php echo get_permalink($pageChild->ID); ?>"><?php echo $pageChild->post_title; ?></a>
					</h4>
					<?php if ( 'post' == get_post_type() ) : ?>
					<span class="date entry-meta">
						<svg class="icon icon-calendar"><use xlink:href="#icon-calendar"></use></svg>&nbsp;<?php the_time( get_option( 'date_format' ) ); ?>
					</span>
					<?php endif; ?>
				</header>
				<?php if ( has_post_thumbnail($pageChild->ID) ) : ?>
				<div class="row">
					<figure class="column">
						<a href="<?php echo get_permalink($pageChild->ID); ?>"><?php echo get_the_post_thumbnail($pageChild->ID, 'medium'); ?></a>
					</figure>
				</div>
				<?php endif; ?>
				<div class="post-description-copy">
					<?php the_excerpt(); ?>
				</div>
				<footer>
					<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
				</footer>
			</article>
			<hr>
			<?php endforeach; endif;?>
			<?php do_action( 'lilleyplace_after_content' ); ?>
		</div>
	</div>
	<div class="shadow white-top"></div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>