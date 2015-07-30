<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<aside class="columns medium-4 sidebar-bg">
	<div class="sidebar">
		<?php do_action( 'lilleyplace_before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
		<?php do_action( 'lilleyplace_after_sidebar' ); ?>
	</div>
</aside>