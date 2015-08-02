<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
		<li class="name show-for-small-only">
			<a href="<?php echo home_url(); ?>"><img role="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/images/Lilleyplace_Logo.png" width="150" height="51" alt="<?php bloginfo( 'name' ); ?>" /></a>
		</li>
      	<li class="toggle-topbar menu-icon"><a href="#"><span><?php _e('Menu','lilleyplace');?></span></a></li>
    </ul>
    <section class="top-bar-section">
        <?php lilleyplace_top_bar(); ?>
    </section>
</nav>