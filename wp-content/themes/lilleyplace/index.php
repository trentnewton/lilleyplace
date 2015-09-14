<?php ini_set('display_errors', 0); ?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
if (function_exists('get_header')) {
	get_header();
} else {
    /* Redirect browser */
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
    /* Make sure that code below does not get executed when we redirect. */
    exit;
}; ?>
	<?php get_template_part( 'parts/banner' ); ?>
</header>
<main class="page-content" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
	<div class="entry-content row">
		<div class="columns medium-8" itemscope itemtype="http://schema.org/Blog">
		<?php if ( have_posts() ) : ?>

			<?php do_action( 'lilleyplace_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'parts/content', 'none' ); ?>

			<?php do_action( 'lilleyplace_before_pagination' ); ?>

		<?php endif;?>

		<?php if ( function_exists( 'lilleyplace_pagination' ) ) { lilleyplace_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'lilleyplace' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'lilleyplace' ) ); ?></div>
			</nav>
		<?php } ?>

			<?php do_action( 'lilleyplace_after_content' ); ?>
		</div>
		<aside class="columns medium-4 sidebar-bg" itemscope itemtype="http://schema.org/WPSideBar">
			<div class="sidebar">
				<?php dynamic_sidebar("Blog Sidebar"); ?>
			</div>
		</aside>
	</div>
	<div class="shadow white-top"></div>
</main>
<?php get_footer(); ?>