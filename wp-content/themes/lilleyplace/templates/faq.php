<?php
/*
Template Name: FAQ's
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/banner' ); ?>
<article <?php post_class('page-content') ?> id="post-<?php the_ID(); ?>">
	<?php if ( is_page() && $post->post_parent > 0 ) { ?>
   	<div class="row">
	   	<div class="columns">
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('sitebreadcrumbs')) sitebreadcrumbs(); ?>
			</nav>
	   	</div>
   	</div>
	<?php } ?>
	<?php if($content = $post->post_content ) {
	echo "<div class=\"row\">";
		echo "<div class=\"columns mar-b-30\">";
		do_action( 'lilleyplace_page_before_entry_content' );
			echo "<div class=\"entry-content\">";
				the_content();
			echo "</div>";
		do_action( 'lilleyplace_page_after_entry_content' );
		echo "</div>";
	echo "</div>";
	} ?>
	<?php if( have_rows('add_a_faq_section') ): ?>
	<div class="row">
		<div class="columns" role="main">
		<?php while( have_rows('add_a_faq_section') ): the_row();
		// vars
		$faq_section_title = get_sub_field('faq_section_title');
		$add_a_faq = get_sub_field('add_a_faq');
		?>
			<?php if( $faq_section_title ): ?>
			<h2><?php echo $faq_section_title ?></h2>
			<?php endif; ?>
			<?php if( get_sub_field('add_a_faq') ): ?>
			<ul class="accordion" data-accordion>
			<?php while(has_sub_field('add_a_faq')): $i++; 
				// vars
				$faq_question = get_sub_field('faq_question');
				$faq_answer = get_sub_field('faq_answer');
				?>
				<?php if( $faq_question ): ?>
				<li class="accordion-navigation">
					<a href="#faq-<?php echo $i; ?>">
						<?php echo $faq_question; ?>
					</a>
					<div id="faq-<?php echo $i; ?>" class="content">
						<?php echo $faq_answer; ?>
					</div>
				</li>
				<?php endif; ?>
			<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		<?php endwhile; ?>	
		</div>
 	</div>
 	<?php endif; ?>
	<div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>