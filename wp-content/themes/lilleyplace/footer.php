<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
		<footer>
			<?php if( get_bloginfo( 'description' ) ): ?>
			<section id="bottom-quote">
				<div class="row">
					<div class="column">
						<h3>
							<svg class="icon icon-quotes-left"><use xlink:href="#icon-quotes-left"></use></svg>
								<?php bloginfo( 'description' ); ?> 
							<svg class="icon icon-quotes-right"><use xlink:href="#icon-quotes-right"></use></svg>
						</h3>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php $latest = new WP_Query( array( 'posts_per_page' => 2 )); if( $latest->have_posts() ) : ?>
			<section id="latest-posts">
				<div class="row latest-posts-inner">
					<div class="column">
						<h3><?php _e( 'Latest Posts from the Blog', 'lilleyplace' ); ?></h3>
						<div class="row">
							<?php while( $latest->have_posts() ) : $latest->the_post(); ?>
							<div class="columns small-2 medium-1">
								<svg class="blog-post-icon blog-post"><use xlink:href="#blog-post"></use></svg>
							</div>
							<article class="columns small-10 medium-5" itemscope itemtype="http://schema.org/BlogPosting">
								<figure>
									<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'small', array('class' => 'th', 'itemprop' => 'image') ); ?>
									</a>
									<?php else : ?>
										<img src="" itemprop="image">
									<?php endif; ?>
								</figure>
								<a href="<?php the_permalink(); ?>"><h4 itemprop="headline"><?php the_title(); ?></h4></a>
								<span class="date entry-meta">
									<time class="updated" datetime="<?php the_time('c') ?>" itemprop="datePublished"><svg class="icon icon-calendar"><use xlink:href="#icon-calendar"></use></svg>&nbsp;<?php the_time( get_option( 'date_format' ) ); ?></time>
								</span>
								<p class="content-excerpt" itemprop="text">
									<?php echo substr(get_the_excerpt(),0,170); ?>&hellip;
								</p>
							</article>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
			<?php endif; wp_reset_postdata(); ?>
			<?php // endif;?>
			<div class="footer-display">
				<div class="row footer-content">
					<div class="columns medium-5 large-6">
						<?php dynamic_sidebar("First Footer Column"); ?>
					</div>
					<div class="columns medium-5 large-4">
						<?php dynamic_sidebar("Second Footer Column"); ?>
					</div>
					<div class="columns medium-2">
						<?php dynamic_sidebar("Third Footer Column"); ?>
					</div>
				</div>
				<aside class="footer-copyright">
					<div class="row">
						<div class="columns medium-6" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
							<p>
							<?php if (get_theme_mod( 'copyright_textbox' ) != '') {?>
								<?php echo get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?>
							<?php } else { ?>
								<?php _e('Copyright','lilleyplace');?>&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<?php bloginfo( 'name' ); ?>.&nbsp;<?php _e('All rights reserved.','lilleyplace');?>
							<?php } ?>
								<br>Website by Happiness Design.
							</p>
						</div>
						<div class="columns medium-6 footer-nav-container">
							<nav>
								<?php lilleyplace_secondary(); ?>
							</nav>
							<a href="#" id="top" class="link-top"><svg class="icon icon-arrow-up"><use xlink:href="#icon-arrow-up"></use></svg>&nbsp;<?php _e('Top','lilleyplace');?></a>
						</div>
					</div>
				</aside>
				<div class="shadow top"></div>
			</div>
		</footer>
		<script type="text/javascript">
	        var templateUrl = '<?php echo get_stylesheet_directory_uri(); ?>';
	    </script>
		<?php wp_footer(); ?>
		<?php do_action( 'lilleyplace_before_closing_body' ); ?>
	</body>
</html>