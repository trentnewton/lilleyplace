<?php
/*
Template Name: Home Page
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php if( get_field('title') ): ?>
<header id="main-hero" role="banner">
	<div class="main-hero-inner">
		<div class="row">
			<div class="column">
				<h1><?php the_field('title'); ?></h1>
				<h3><?php the_field('sub-title'); ?></h3>
				<a href="<?php the_field('call_to_action_link'); ?>" class="button large"><?php the_field('call_to_action_name'); ?></a>
			</div>
		</div>
	</div>
	<div class="shadow top"></div>
	<div class="shadow bottom"></div>
</header>
<?php endif; ?>
<?php if( get_field('top_quote') ): ?>
<section id="top-quote">
	<div class="row">
		<div class="column">
			<h4>
				<svg class="icon icon-quotes-left"><use xlink:href="#icon-quotes-left"></use></svg>
				<?php the_field('top_quote'); ?>
				<svg class="icon icon-quotes-right"><use xlink:href="#icon-quotes-right"></use></svg>
			</h4>
			<?php if( get_field('top_citation') ): ?>
			<p role="citation"><?php the_field('top_citation'); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<div class="shadow grey-top"></div>
</section>
<?php endif; ?>
<?php if(get_field('add_a_box')): $i = 0; ?>
<section id="info-boxes">
	<div class="row">
		<div class="column">
			<h2><?php the_field('info_box_section_title'); ?></h2>
			<div class="info-boxes-list" data-equalizer="foo" data-options="equalize_on_stack: true;" data-equalizer-mq="medium-up">
				<ul id="info-box-accordion" class="small-block-grid-1 medium-block-grid-2 accordion" data-equalizer="bar" data-accordion data-options="equalize_on_stack: true;">
				<?php while(has_sub_field('add_a_box')): $i++;
					$box_title = get_sub_field('box_title');
					?>
					<?php if( $box_title ): ?>
					<li class="accordion-navigation">
						<a href="#panel-<?php echo $i; ?>" data-equalizer-watch="bar"><?php the_sub_field('box_title'); ?></a>
						<div id="panel-<?php echo $i; ?>" class="content" data-equalizer-watch="foo">
							<ul>
							<?php while(has_sub_field('add_a_list_item')): $i++;
								$list_item = get_sub_field('list_item');
								?>
								<?php if( $list_item ): ?>
						  		<li><?php the_sub_field('list_item'); ?>
						  			<?php if(get_sub_field('add_a_sub_item')): ?>
										<ul class="small-block-grid-2 medium-block-grid-3 list">
										<?php while(has_sub_field('add_a_sub_item')): $i++;
											$sub_item = get_sub_field('sub_item');
											?>
											<li><?php the_sub_field('sub_item'); ?></li>
										<?php endwhile; ?>	
										</ul>
									<?php endif; ?>
						  		</li>
								<?php endif; ?>
							<?php endwhile; ?>
						  	</ul>
						</div>
					</li>
			 		<?php endif; ?>
				<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<main id="main-text" class="row">
	<?php do_action( 'lilleyplace_before_content' ); ?>
	<article class="column">
	<?php if( get_field('banner_title') ): ?>
		<header>
			<h2><?php the_field('banner_title'); ?></h2>
		</header>
		<?php else : ?>
		<header>
			<?php the_title(); ?>
		</header>
	<?php endif; ?>
		<div class="entry-content">
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
			<?php the_content(); ?>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
			<?php if(get_field('front_page_image_gallery')): $i = 0; ?>
			<div class="slider-container mar-t-60">
				<div class="slider">
				<?php while(has_sub_field('front_page_image_gallery')): $i++;
					$front_page_image = get_sub_field('front_page_image');

					  	if (isset($_GET['width'])) {
						    $width = $_GET['width'];
						    if ($width <= 640) { // small sizes
						      	$front_page_image_resized = ($front_page_image['width'] / 4);
						    } elseif ($width <= 1024){ // medium sizes
						      	$front_page_image_resized = ($front_page_image['width'] / 2);
						    } else { // large sizes
						      	$front_page_image_resized = ($front_page_image['width'] / 2);
						    }
						} else {
						    echo "<script>\n";
						    echo "  location.href=\"?&width=\" + screen.width; \n";
						    echo "</script>\n";
						    exit();
						}
				?>
					<?php if( $front_page_image ): ?>
					<figure style="width:<?php echo $front_page_image_resized; ?>px;">
						<img src="<?php echo $front_page_image['url']; ?>" width="<?php echo $front_page_image['width']; ?>" height="<?php echo $front_page_image['height']; ?>" alt="<?php echo $front_page_image['alt'] ?>" />
					</figure>
			 		<?php endif; ?>
				<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</article>
	<?php do_action( 'lilleyplace_after_content' ); ?>
</main>
<?php endwhile;?>
<?php get_footer(); ?>