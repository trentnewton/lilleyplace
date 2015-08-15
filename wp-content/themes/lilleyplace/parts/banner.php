<?php
/**
 * Template part for banner
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<section id="small-banner">
    <div class="row">
	    <div class="column small-banner-inner">
	        <h1 class="entry-title">
			<?php if( is_search() ) : ?>
				<?php _e( 'Search Results', 'lilleyplace' ); ?>
			<?php elseif (function_exists('lilleyplace_get_posts_page') || is_home() || is_archive() || is_single() ) : ?>
				<?php if (function_exists('lilleyplace_get_posts_page')) echo lilleyplace_get_posts_page('title'); ?>
			<?php elseif( is_404() ) : ?>
				<?php _e( 'Page Not Found', 'lilleyplace' ); ?>
			<?php elseif (function_exists('get_field') || get_field('banner_title') ) : ?>
				<?php if (function_exists('the_field')) the_field('banner_title'); ?>
			<?php else : ?>
				<?php the_title(); ?>
			<?php endif; ?>
	        </h1>
	        <?php if( is_search() ): ?>
	        <?php else : ?>
            <form class="search-box searchform" method="get" action="<?php echo home_url('/'); ?>">
				<label>
					<svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
					<input type="search" class="s" placeholder="<?php _e( 'Search', 'lilleyplace' ); ?>&hellip;"  value="" name="s" title="<?php _e( 'Search', 'lilleyplace' ); ?>&hellip;">
				</label>
				<input type="submit" class="search-submit" value="<?php _e( 'Search', 'lilleyplace' ); ?>">
			</form>
	        <?php endif; ?>
	    </div>
    </div>
	<div class="shadow top"></div>
	<div class="shadow bottom"></div>
</section>