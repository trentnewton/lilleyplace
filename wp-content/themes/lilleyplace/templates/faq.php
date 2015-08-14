<?php
/*
Template Name: FAQ's
*/
get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<section role="main" id="post-<?php the_ID(); ?>" <?php post_class('page-content') ?>>
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
	<?php if ( $content = $post->post_content ) : ?>
	<?php do_action( 'lilleyplace_before_content' ); ?>
	<article class="row">
		<div class="column mar-b-30">
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
		</div>
	</article>
	<?php do_action( 'lilleyplace_after_content' ); ?>
	<?php endif; ?>
	<?php if( have_rows('add_a_faq_section') ): ?>
	<article class="row">
		<div class="column">
		<?php while( have_rows('add_a_faq_section') ): the_row();
		// vars
		$faq_section_title = get_sub_field('faq_section_title');
		$add_a_faq = get_sub_field('add_a_faq');
		?>
			<?php if( $faq_section_title ): ?>
			<h2><?php echo $faq_section_title ?></h2>
			<?php endif; ?>
			<?php if( get_sub_field('add_a_faq') ): ?>
			<ul class="accordion" data-accordion itemscope itemtype="http://schema.org/Question">
			<?php while(has_sub_field('add_a_faq')): $i++; 
				// vars
				$faq_question = get_sub_field('faq_question');
				$faq_answer = get_sub_field('faq_answer');
				?>
				<?php if( $faq_question ): ?>
				<li class="accordion-navigation">
					<a href="#faq-<?php echo $i; ?>" itemprop="name">
						<?php echo $faq_question; ?>
					</a>
					<div id="faq-<?php echo $i; ?>" class="content" itemprop="suggestedAnswer acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
						<div itemprop="text">
							<?php echo $faq_answer; ?>
						</div>
					</div>
				</li>
				<?php endif; ?>
			<?php endwhile; ?>
			</ul>
			<?php endif; ?>
			<hr>
		<?php endwhile; ?>	
		</div>
 	</article>
 	<?php endif; ?>
	<div class="shadow white-top"></div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>