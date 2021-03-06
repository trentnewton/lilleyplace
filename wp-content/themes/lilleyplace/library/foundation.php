<?php
/**
 * Foundation PHP template
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

// Pagination.
if ( ! function_exists( 'lilleyplace_pagination' ) ) :
function lilleyplace_pagination() {
	global $wp_query;

	$big = 999999999; // This needs to be an unlikely integer

	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5,
		'prev_next' => true,
	    'prev_text' => __( '&laquo;', 'lilleyplace' ),
	    'next_text' => __( '&raquo;', 'lilleyplace' ),
		'type' => 'list',
	) );

	$paginate_links = str_replace( "<ul class='page-numbers'>", '<ul class="pagination" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">', $paginate_links );
	$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li itemprop='url'><a href='#' itemprop='name'>", $paginate_links );
	$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li itemprop='url' class='current'><a href='#' itemprop='name'>", $paginate_links );
	$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
	$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
	$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );

	// Display the pagination if more than one page is found.
	if ( $paginate_links ) {
		echo '<div class="pagination-centered">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}
endif;

/**
 * A fallback when no navigation is selected by default.
 */

if ( ! function_exists( 'lilleyplace_menu_fallback' ) ) :
function lilleyplace_menu_fallback() {
	echo '<div class="alert-box secondary">';
	// Translators 1: Link to Menus, 2: Link to Customise.
		printf( __( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'lilleyplace' ),
			sprintf(  __( '<a href="%s">Menus</a>', 'lilleyplace' ),
				get_admin_url( get_current_blog_id(), 'nav-menus.php' )
			),
			sprintf(  __( '<a href="%s">Customise</a>', 'lilleyplace' ),
				get_admin_url( get_current_blog_id(), 'customize.php' )
			)
		);
		echo '</div>';
}
endif;

// Add Foundation 'active' class for the current menu item.
if ( ! function_exists( 'lilleyplace_active_nav_class' ) ) :
function lilleyplace_active_nav_class( $classes, $item ) {
	if ( 1 == $item->current || true == $item->current_item_ancestor ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'lilleyplace_active_nav_class', 10, 2 );
endif;

/**
 * Use the active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch.
 */
if ( ! function_exists( 'lilleyplace_active_list_pages_class' ) ) :
function lilleyplace_active_list_pages_class( $input ) {

	$pattern = '/current_page_item/';
	$replace = 'current_page_item active';

	$output = preg_replace( $pattern, $replace, $input );

	return $output;
}
add_filter( 'wp_list_pages', 'lilleyplace_active_list_pages_class', 10, 2 );
endif;

if ( ! class_exists( 'lilleyplace_Comments' ) ) :
class Lilleyplace_Comments extends Walker_Comment{

	// Init classwide variables.
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() { ?>
         
        <h3><?php comments_number( __( 'No Responses to', 'lilleyplace' ), __( 'One Response to', 'lilleyplace' ), __( '% Responses to', 'lilleyplace' ) ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
        <ol class="comment-list">
         
    <?php }

	/** START_LVL
	 * Starts the list before the CHILD elements are added. */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>
 
                <ul class="children">
    <?php }

	/** END_LVL
	 * Ends the children list of after the elements are added. */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>
 
		</ul><!-- /.children -->
         
    <?php }

	/** START_EL */
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <article id="comment-body-<?php comment_ID() ?>" class="comment-body" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
				<header class="comment-author" itemprop="creator" itemscope itemtype="http://schema.org/Person">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<div class="author-meta vcard author">
						<cite class="fn" itemprop="name"><?php if ($comment->user_id) {
						$user=get_userdata($comment->user_id);
						echo $user->display_name;
						} else { comment_author_link(); } ?></cite>
						<time itemprop="commentTime" datetime="<?php echo comment_date( 'c' ) ?>">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __( '%1$s', 'lilleyplace' ), get_comment_date(),  get_comment_time() ) ?></a>
						</time>
					</div><!-- /.comment-author -->
				</header>
                <section id="comment-content-<?php comment_ID(); ?>" class="comment" itemprop="commentText">
                    <?php if ( ! $comment->comment_approved ) : ?>
                    <div class="notice">
						<p class="bottom"><?php $args['moderation']; ?></p>
					</div>                     
                    <?php else : comment_text(); ?>
                    <?php endif; ?>
                </section><!-- /.comment-content -->
                <div class="comment-meta comment-meta-data hide">
                    <a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ) ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
                </div><!-- /.comment-meta -->
                <div class="reply">
                    <?php $reply_args = array(
						'depth' => $depth,
						'max_depth' => $args['max_depth'],
						);
					comment_reply_link( array_merge( $args, $reply_args ) );  ?>
                </div><!-- /.reply -->
            </article><!-- /.comment-body -->
    <?php }

	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
         
        </li><!-- /#comment-' . get_comment_ID() . ' -->
         
    <?php }

	/** DESTRUCTOR */
	function __destruct() { ?>
     
    </ol><!-- /#comment-list -->
 
    <?php }
}
endif;

?>
