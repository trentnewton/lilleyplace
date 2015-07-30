<?php
/**
 * Template part for banner
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<header id="small-banner" role="banner">
    <div class="row">
	    <div class="column">
	        <div class="small-banner-container">
		        <h1 class="entry-title">
				<?php if( is_search() ) : ?>
					<?php _e( 'Search Results', 'lilleyplace' ); ?>
				<?php elseif( is_home() ) : ?>
					<?php echo lilleyplace_get_posts_page('title'); ?>
				<?php elseif( is_archive() ) : ?>
					<?php echo lilleyplace_get_posts_page('title'); ?>
				<?php elseif( is_single() ) : ?>
					<?php echo lilleyplace_get_posts_page('title'); ?>
				<?php elseif( is_404() ) : ?>
					<?php _e( 'Page Not Found', 'lilleyplace' ); ?>
				<?php elseif( get_field('banner_title') ): ?>
					<?php the_field('banner_title'); ?>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
		        </h1>
		        <?php if( is_search() ): ?>
		        <?php else : ?>
				<div class="search-box">
		            <form method="get" class="searchform" action="<?php echo home_url('/'); ?>">
			            <svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
			            <input name="s" class="s" placeholder="<?php _e( 'Search', 'lilleyplace' ); ?>&hellip;" type="text">
		            </form>
		        </div>
		        <?php endif; ?>
	        </div>
	    </div>
    </div>
	<div class="shadow top"></div>
	<div class="shadow bottom"></div>
</header>