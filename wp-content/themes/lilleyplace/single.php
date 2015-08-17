<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section role="main" class="page-content" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
	<div class="row">
		<div class="columns medium-8">
	   		<nav class="breadcrumbs-container">
				<?php if (function_exists('blog_breadcrumbs')) blog_breadcrumbs(); ?>
			</nav>
		<?php do_action( 'lilleyplace_before_content' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class('entry-content') ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="mar-b-30">
					<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
					<?php lilleyplace_entry_meta(); ?>
				</header>
				<?php do_action( 'lilleyplace_post_before_entry_content' ); ?>
				<?php if ( has_post_thumbnail() ) : ?>
				<figure>
					<?php the_post_thumbnail( '', array('class' => 'th mar-b-30', 'itemprop' => 'image') ); ?>
				</figure>
				<?php endif; ?>
				<div itemprop="text">
					<?php the_content(); ?>
				</div>
			</article>
			<footer>
				<?php wp_link_pages(); ?>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'lilleyplace' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
				<?php get_template_part( 'parts/social_likes' ); ?>
			</footer>
			<hr>
			<article class="row author-bio">
				<div class="columns small-3 medium-2">
					<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
				</div>
				<div class="columns small-9 medium-10 author-info">
					<h4 class="author-title"><?php _e('About the Author:', 'lilleyplace'); ?> <?php the_author_link(); ?></h3>
					<p class="author-description small"><?php the_author_meta('description'); ?></p>
				</div>
			</article>
			<?php do_action( 'lilleyplace_post_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'lilleyplace_post_after_comments' ); ?>
		<?php endwhile;?>
		<?php do_action( 'lilleyplace_after_content' ); ?>
		</div>
		<aside class="columns medium-4 sidebar-bg">
			<div class="sidebar">
				<?php dynamic_sidebar("Blog Sidebar"); ?>
			</div>
		</aside>
	</div>
  <div class="shadow white-top"></div>
</section>
<?php get_footer(); ?>