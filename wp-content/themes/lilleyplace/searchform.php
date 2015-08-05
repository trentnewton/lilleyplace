<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

do_action( 'lilleyplace_before_searchform' ); ?>
<form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="row">
		<div class="column">
			<div class="row collapse postfix-radius">
				<?php do_action( 'lilleyplace_searchform_top' ); ?>
				<div class="columns small-8 medium-10">
					<input name="s" id="s" type="search" placeholder="<?php _e( 'Enter your search terms here', 'lilleyplace' ); ?>" value="<?php echo get_search_query(); ?>">
				</div>
				<?php do_action( 'lilleyplace_searchform_before_search_button' ); ?>
				<div class="columns small-4 medium-2">
					<input id="searchsubmit" value="<?php _e( 'Go', 'lilleyplace' ); ?>" class="button postfix" type="submit">
				</div>
				<?php do_action( 'lilleyplace_searchform_after_search_button' ); ?>
			</div>
		</div>
	</div>
</form>
<?php do_action( 'lilleyplace_after_searchform' ); ?>