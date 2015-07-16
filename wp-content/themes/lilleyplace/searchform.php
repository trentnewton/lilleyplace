<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

do_action( 'lilleyplace_before_searchform' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
		<?php do_action( 'lilleyplace_searchform_top' ); ?>
		<div class="small-8 columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'lilleyplace' ); ?>">
		</div>
		<?php do_action( 'lilleyplace_searchform_before_search_button' ); ?>
		<div class="small-4 columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'lilleyplace' ); ?>" class="prefix button">
		</div>
		<?php do_action( 'lilleyplace_searchform_after_search_button' ); ?>
	</div>
</form>
<?php do_action( 'lilleyplace_after_searchform' ); ?>