<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

</section>
<footer class="row">
	<?php do_action( 'lilleyplace_before_footer' ); ?>
	<?php dynamic_sidebar( 'footer-widgets' ); ?>
	<?php do_action( 'lilleyplace_after_footer' ); ?>
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action( 'lilleyplace_layout_end' ); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action( 'lilleyplace_before_closing_body' ); ?>
</body>
</html>