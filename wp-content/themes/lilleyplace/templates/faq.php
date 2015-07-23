<?php
/*
Template Name: FAQ's
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<? if($content = $post->post_content ) {
	echo "<div class=\"row\">";
		echo "<div class=\"columns small-12 mar-b-30\">";
		do_action( 'lilleyplace_page_before_entry_content' );
			echo "<div class=\"entry-content\">";
				the_content();
			echo "</div>";
		do_action( 'lilleyplace_page_after_entry_content' );
		echo "</div>";
	echo "</div>";
	} ?>
	<?php if(get_field('add_a_faq')): $i = 0; ?>
	<div class="row">
		<div class="columns small-12" role="main">
			<ul class="accordion" data-accordion>
			<?php while(has_sub_field('add_a_faq')): $i++;
				$faq_question = get_sub_field('faq_question');
				$faq_answer = get_sub_field('faq_answer');
				?>
				<?php if( $faq_question ): ?>
				<li class="accordion-navigation">
					<a href="#faq-<?php echo $i; ?>">
						<?php the_sub_field('faq_question'); ?>
					</a>
					<div id="faq-<?php echo $i; ?>" class="content">
						<?php the_sub_field('faq_answer'); ?>
					</div>
				</li>
		 		<?php endif; ?>
			<?php endwhile; ?>
			</ul>
		</div>
 	</div>
	<?php endif; ?>
	<div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>