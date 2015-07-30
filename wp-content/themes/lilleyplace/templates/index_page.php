<?php
/*
Template Name: Index
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<?php get_template_part( 'parts/banner' ); ?>
	<section class="page-content">
	<?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order DESC", 'OBJECT'); ?>
		<div class="row">
			<div class="columns">
			<?php if($content = $post->post_content ) {
				echo "<h4 class=\"mar-b-30\">";
						echo get_the_content();
				echo "</h4>";
			} ?>
				<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
				<article id="post-<?php echo $pageChild->ID; ?>">
					<div class="post-description">
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
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="row">
							<div class="column">
								<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="post-description-copy">
							<?php the_excerpt(); ?>
						</div>
						<footer>
							<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
						</footer>
					</div>
					<hr>
				</article>
				<?php endforeach; endif;?>
			</div>
		</div>
		<div class="shadow white-top"></div>
	</section>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>