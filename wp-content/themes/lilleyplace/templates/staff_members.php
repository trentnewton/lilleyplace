<?php
/*
Template Name: Staff Members
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
		echo "<div class=\"columns small-12 mar-b-30\">";
		do_action( 'lilleyplace_page_before_entry_content' );
			echo "<div class=\"entry-content\">";
				the_content();
			echo "</div>";
		do_action( 'lilleyplace_page_after_entry_content' );
		echo "</div>";
	echo "</div>";
	} ?>
	<?php if( have_rows('add_a_new_staff_member') ): ?>
	<?php while( have_rows('add_a_new_staff_member') ): the_row();
		// vars
		$member_name = get_sub_field('member_name');
		$member_title = get_sub_field('member_title');
		$member_list = get_sub_field('member_list');
		$member_logo= get_sub_field('member_logo');
		$member_bio = get_sub_field('member_bio');
		$member_bio_more = get_sub_field('member_bio_more');
		$member_photo = get_sub_field('member_photo');
		?>
	<?php if( $member_name ): ?>
	<div class="row">
		<div class="columns small-6 medium-3">
			<p class="member-name"><?php echo $member_name ?></p>
			<p class="member-title"><?php echo $member_title ?></p>
			<?php if( have_rows('member_list') ): ?>
			<ul class="member-list">
			<?php while( have_rows('member_list') ): the_row(); 
				// vars
				$member_logo= get_sub_field('member_logo');
				?>
				<li>
					<img src="<?php echo $member_logo['url']; ?>" alt="<?php echo $member_logo['alt'] ?>" width="226" height="84" />
				</li>
			<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>
        <div class="columns small-6 medium-3 medium-push-6">
        	<?php if( $member_photo ): ?>
			<div class="member-frame">
				<img src="<?php echo $member_photo['url']; ?>" width="<?php echo $member_photo['width'] ?>" height="<?php echo $member_photo['height'] ?>" alt="<?php echo $member_name ?>" />
			</div>
			<?php else : ?>
			<div class="member-frame">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/images/PhotoComing_large.jpg" alt="<?php echo $member_name ?>" />
			</div>
			<?php endif; ?>
        </div>
		<div class="columns small-12 medium-6 medium-pull-3">
			<p><?php echo $member_bio ?></p>
			<?php if( $member_bio_more ): ?>
			<ul class="accordion" data-accordion>
				<li class="accordion-navigation">
					<a href="#read-more-<?php print custom_fields_to_classes( $member_name ); ?>"><?php _e('Read More','lilleyplace');?></a>
					<div id="read-more-<?php print custom_fields_to_classes( $member_name ); ?>" class="content">
						<?php echo $member_bio_more ?>
					</div>
				</li>
			</ul>
			<?php endif; ?>
		</div>
		<div class="columns small-12">
			<hr>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>
	<div class="shadow white-top"></div>
</article>
<?php endwhile;?>
<?php do_action( 'lilleyplace_after_content' ); ?>
<?php get_footer(); ?>