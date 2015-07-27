<?php
/*
Template Name: Home Page
*/
get_header(); ?>
<?php do_action( 'lilleyplace_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php if( get_field('title') ): ?>
<section id="main-hero">
	<div class="main-hero-inner">
		<div class="row">
			<div class="small-12 columns">
				<h1><?php the_field('title'); ?></h1>
				<p><?php the_field('sub-title'); ?></p>
				<a href="<?php the_field('call_to_action_link'); ?>" class="button large"><?php the_field('call_to_action_name'); ?></a>
			</div>
		</div>
	</div>
	<div class="shadow top"></div>
	<div class="shadow bottom"></div>
</section>
<?php endif; ?>
<?php if( get_field('top_quote') ): ?>
<section id="top-quote">
	<div class="row">
		<div class="small-12 columns">
			<h4>
				<svg class="icon icon-quotes-left"><use xlink:href="#icon-quotes-left"></use></svg>
				<?php the_field('top_quote'); ?>
				<svg class="icon icon-quotes-right"><use xlink:href="#icon-quotes-right"></use></svg>
			</h4>
			<?php if( get_field('top_citation') ): ?>
			<p><?php the_field('top_citation'); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<div class="shadow grey-top"></div>
</section>
<?php endif; ?>
<section id="info-boxes">
	<div class="row">
		<div class="columns small-12">
			<h2>How Can Lilley Place Help Me?</h2>
			<div class="info-boxes-list" data-equalizer="foo" data-options="equalize_on_stack: true;" data-equalizer-mq="medium-up">
				<ul class="small-block-grid-1 medium-block-grid-2" data-equalizer="bar" data-options="equalize_on_stack: true;" data-equalizer-mq="medium-up">
				  	<li>
						<div class="tt-contentbox-title tt-cb-title-lime-green" data-equalizer-watch="bar">
							<h6>Do I need a referral to see a psychologist?</h6>
						</div>
						<div class="tt-contentbox-content" data-equalizer-watch="foo">
							<ul>
						  		<li>No</li>
						  		<li>However, if you are eligible to claim a Medicare rebate, you will need a written referral from a psychiatrist, paediatrician or GP</li>
						  		<li>Your GP also needs to complete a Mental Health Care Plan</li>
						  	</ul>
						</div>
				  	</li>
				  	<li>
			  			<div class="tt-contentbox-title tt-cb-title-lime-green" data-equalizer-watch="bar">
			  				<h6>Would talking to a psychologist be good for me?</h6>
			  			</div>
			  			<div class="tt-contentbox-content" data-equalizer-watch="foo">
			  				<ul>
						  		<li>There are many reasons for talking to a psychologist</li>
						  		<li>Are you troubled by feelings, behaviours, thoughts or concerns that prevent you from functioning to your full capacity or from feeling happy and fulfilled in your life?</li>
						  		<li>Do you have concerns about:</li>
						  	</ul>
						  	<ul class="small-block-grid-2 medium-block-grid-3 list">
					  			<li>Relationships</li>
					  			<li>Life Changes</li>
					  			<li>Criticism</li>
					  			<li>Worry</li>
					  			<li>Energy</li>
					  			<li>Coping</li>
					  			<li>Sleep</li>
					  			<li>Concentration</li>
					  			<li>Mood</li>
					  			<li>Food</li>
					  			<li>Self-Control</li>
					  			<li>Enjoyment</li>
					  			<li>Anger</li>
					  			<li>Confidence</li>
					  			<li>Emotions</li>
					  		</ul>
			  			</div>
				  	</li>
			  		<li>
			  			<div class="tt-contentbox-title tt-cb-title-lime-green" data-equalizer-watch="bar">
			  				<h6>How can therapy help me?</h6>
			  			</div>
			  			<div class="tt-contentbox-content" data-equalizer-watch="foo">
			  				<ul>
						  		<li>Seeking help does not mean there is something wrong with you</li>
						  		<li>Everyone can benefit from talking to someone who has a neutral viewpoint and who is not closely related to you or the situation</li>
						  		<li>This type of professional relationship can be healthy and beneficial for your growth and future</li>
						  	</ul>
			  			</div>
			  		</li>
				  	<li>
			  			<div class="tt-contentbox-title tt-cb-title-lime-green" data-equalizer-watch="bar">
			  				<h6>What can I expect at my first appointment?</h6>
			  			</div>
			  			<div class="tt-contentbox-content" data-equalizer-watch="foo">
			  				<ul>
						  		<li>To be treated with respect and compassion</li>
						  		<li>Therapists will work through any questions you have and discuss confidentiality</li>
						  		<li>Together with your psychologist you will work towards a shared understanding of what is happening and why</li>
						  		<li>Therapists will work with you to set goals for therapy</li>
						  	</ul>
			  			</div>
				  	</li>
				  	<li>
			  			<div class="tt-contentbox-title tt-cb-title-lime-green" data-equalizer-watch="bar">
			  				<h6>How many sessions can I have?</h6>
			  			</div>
			  			<div class="tt-contentbox-content" data-equalizer-watch="foo">
			  				<ul>
						  		<li>There is no limit to the number of sessions you can have</li>
						  		<li>However, Medicare provides a rebate for a maximum of 10 individual sessions in a year</li>
						  		<li>If you require more than 10 sessions you can check if your private health insurer offers a rebate on psychology sessions</li>
						  		<li>You can also talk to your GP about whether you are eligible for 6 sessions under the Chronic Disease Management Plan or whether any other funding options are available</li>
						  	</ul>
			  			</div>
				  	</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section id="main-text">
	<div class="row">
		<div class="main-text-inner">
			<div class="columns small-12">
			<?php if( get_field('banner_title') ): ?>
				<h2><?php the_field('banner_title'); ?></h2>
				<?php else : ?>
				<?php the_title(); ?>
			<?php endif; ?>
			<?php do_action( 'lilleyplace_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
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
							<div style="width:<?php echo $front_page_image_resized; ?>px;">
								<img src="<?php echo $front_page_image['url']; ?>" width="<?php echo $front_page_image['width']; ?>" height="<?php echo $front_page_image['height']; ?>" alt="<?php echo $front_page_image['alt'] ?>" />
							</div>
					 		<?php endif; ?>
						<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			<?php do_action( 'lilleyplace_page_after_entry_content' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>