<?php
/**
 * Register widget areas
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'lilleyplace_sidebar_widgets' ) ) :
function lilleyplace_sidebar_widgets() {
   register_sidebar(array(
     'id' => 'sidebar-widgets',
     'name' => __( 'Sidebar widgets', 'lilleyplace' ),
     'description' => __( 'A sidebar to use on any page. Drag widgets to this sidebar container.', 'lilleyplace' ),
     'before_widget' => '<div id="%1$s" class="sidebar-widget">',
     'after_widget' => '</div>',
     'before_title' => '<h4>',
     'after_title' => '</h4>',
   ));

   register_sidebar(array(
     'id' => 'blog-sidebar',
     'name' => __( 'Blog Sidebar', 'lilleyplace' ),
     'description' => __( 'A sidebar to use on any page. Drag widgets to this sidebar container.', 'lilleyplace' ),
     'before_widget' => '<div id="%1$s" class="sidebar-widget">',
     'after_widget' => '</div>',
     'before_title' => '<h4>',
     'after_title' => '</h4>',
   ));

	register_sidebar(array(
	  'id' => 'search-sidebar',
	  'name' => __( 'Search Sidebar', 'lilleyplace' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'lilleyplace' ),
	  'before_widget' => '<div id="%1$s" class="sidebar-widget">',
	  'after_widget' => '</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

	register_sidebar(array(
	  'id' => 'contact-sidebar',
	  'name' => __( 'Contact Sidebar', 'lilleyplace' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'lilleyplace' ),
	  'before_widget' => '<div id="%1$s" class="sidebar-widget">',
	  'after_widget' => '</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

   register_sidebar(array(
     'id' => 'resources-sidebar',
     'name' => __( 'Resources Sidebar', 'lilleyplace' ),
     'description' => __( 'Drag widgets to this sidebar container.', 'lilleyplace' ),
     'before_widget' => '<div class="tt-contentbox">',
     'after_widget' => '</div></div>',
     'before_title' => '<div class="tt-contentbox-title tt-cb-title-lime-green"><h6>',
     'after_title' => '</h6></div><div class="tt-contentbox-content tt-content-style-lime-green">',
   ));

	register_sidebar(array(
	  'id' => 'footer-first-column',
	  'name' => __( 'First Footer Column', 'lilleyplace' ),
	  'description' => __( 'Drag widgets to this footer container', 'lilleyplace' ),
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

	register_sidebar(array(
	  'id' => 'footer-second-column',
	  'name' => __( 'Second Footer Column', 'lilleyplace' ),
	  'description' => __( 'Drag widgets to this footer container', 'lilleyplace' ),
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

	register_sidebar(array(
	  'id' => 'footer-third-column',
	  'name' => __( 'Third Footer Column', 'lilleyplace' ),
	  'description' => __( 'Drag widgets to this footer container', 'lilleyplace' ),
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));
}

add_action( 'widgets_init', 'lilleyplace_sidebar_widgets' );
endif;

/*
===============================================================================

Social Media Widget

===============================================================================
*/
class SocialMediaWidget extends WP_Widget
{
   function SocialMediaWidget()
   {
      $widget_ops = array(
         'classname' => 'social_widget',
         'description' => __('Link to your RSS feed and social media accounts.', 'lilleyplace')
      );
      $this->WP_Widget('social_networks', __('Social Networks', 'lilleyplace'), $widget_ops);
   }
   function widget($args, $instance)
   {
      extract($args);
      $title      = apply_filters('widget_title', $instance['title']);
      $title_link = strip_tags($instance['title_link']);
      if (!empty($title_link)) {
         $title_page = get_post($title_link);
      }
      $networks['RSS']        = $instance['rss'];
      $networks['Twitter']    = $instance['twitter'];
      $networks['Facebook']   = $instance['facebook'];
      $networks['Instagram']  = $instance['instagram'];
      $networks['Email']      = $instance['email'];
      $networks['Flickr']     = $instance['flickr'];
      $networks['YouTube']    = $instance['youtube'];
      $networks['LinkedIn']   = $instance['linkedin'];
      $networks['FourSquare'] = $instance['foursquare'];
      $networks['Delicious']  = $instance['delicious'];
      $networks['Digg']       = $instance['digg'];
      $networks['Google-plus']   = $instance['google-plus'];
      $display                = $instance['display'];
      echo $before_widget;
      if (!empty($title)) {echo $before_title;}
      if (!empty($title_link)) {
         echo "<a href=\"" . get_permalink($title_page->ID) . "\">";
      }
      if (empty($title)) {
         echo $title_page->post_title;
      } else {
         echo $title;
      }
      if (!empty($title_link)) {
         echo "</a>";
      }

if (!empty($title)) {echo $after_title;}
?>
		



<ul class="social-icons">
<?php
      foreach (array(
         "Twitter",
      	"Facebook",
         "Instagram",
         "Email",
         "Flickr",
         "YouTube",
         "LinkedIn",
         "FourSquare",
         "Delicious",
         "Digg",
         "Google-plus"
      ) as $network):
?>
<?php
         if (!empty($networks[$network])):
?>
<li><a href="<?php
            echo $networks[$network];
?>" class="<?php
            echo strtolower($network);
?>" target="_blank"><svg class="icon icon-<?php
            echo strtolower($network);
?>"><use xlink:href="#icon-<?php
            echo strtolower($network);
?>"></use></svg></a></li>
<?php
         endif;
?>
<?php
      endforeach;
?>

<?php
      if (empty($networks['RSS'])):
?>
<li><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="rss">
<svg class="icon icon-feed"><use xlink:href="#icon-feed"></use></svg></a></li>
<?php
      else:
?>
<li><a href="<?php echo $networks['RSS']; ?>" target="_blank" class="rss">
<svg class="icon icon-feed"><use xlink:href="#icon-feed"></use></svg></a></li>
<?php
      endif;
?>
	
</ul>

		<?php
      echo $after_widget;
   }
   function update($new_instance, $old_instance)
   {
      $instance                  = $old_instance;
      $instance['title']         = strip_tags($new_instance['title']);
      $instance['title_link']    = $new_instance['title_link'];
      $instance['rss']           = $new_instance['rss'];
      $instance['twitter']       = $new_instance['twitter'];
      $instance['facebook']      = $new_instance['facebook'];
      $instance['instagram']     = $new_instance['instagram'];
      $instance['email']         = $new_instance['email'];
      $instance['flickr']        = $new_instance['flickr'];
      $instance['youtube']       = $new_instance['youtube'];
      $instance['linkedin']      = $new_instance['linkedin'];
      $instance['foursquare']    = $new_instance['foursquare'];
      $instance['delicious']     = $new_instance['delicious'];
      $instance['digg']          = $new_instance['digg'];
      $instance['google-plus']   = $new_instance['google-plus'];
      $instance['display']       = $new_instance['display'];
      return $instance;
   }
   function form($instance)
   {
      $instance   = wp_parse_args((array) $instance, array(
         'title' => '',
         'text' => '',
         'title_link' => ''
      ));
      $title      = strip_tags($instance['title']);
      $title_link = strip_tags($instance['title_link']);
      //define variables to prevent wp_debug error.
      $rss        = $twitter = $facebook = $instagram = $flickr = $youtube = $linkedin = $foursquare = $delicious = $digg = $google_plus = $display = '';
      $rss           = $instance['rss'];
      $twitter       = $instance['twitter'];
      $facebook      = $instance['facebook'];
      $instagram     = $instance['instagram'];
      $email         = $instance['email'];
      $flickr        = $instance['flickr'];
      $youtube       = $instance['youtube'];
      $linkedin      = $instance['linkedin'];
      $foursquare    = $instance['foursquare'];
      $delicious     = $instance['delicious'];
      $digg          = $instance['digg'];
      $google_plus   = $instance['google-plus'];
      $display       = $instance['display'];
      $text          = format_to_edit($instance['text']);
?>
		<p style="color:#999;"><em><?php _e('Enter the full URL to each of your social media accounts. Simply leave the field blank if you wish not to display that social media service.', 'lilleyplace'); ?></em></p><br />

		<p><label for="<?php
      echo $this->get_field_id('title');
?>"><?php
      _e('Title:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('title');
?>" name="<?php
      echo $this->get_field_name('title');
?>" type="text" value="<?php
      echo esc_attr($title);
?>" /></p>

    	<p><label for="<?php
      echo $this->get_field_id('title_link');
?>"><?php
      _e('Title link:', 'lilleyplace');
?></label>     
    	<?php
      wp_dropdown_pages(array(
         'selected' => $title_link,
         'name' => $this->get_field_name('title_link'),
         'show_option_none' => __('None', 'lilleyplace'),
         'sort_column' => 'menu_order, post_title'
      ));
?>
   		 </p>
		
		<p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS URL: (leave empty for default feed)', 'lilleyplace'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" /></p>

		<p><label for="<?php
      echo $this->get_field_id('twitter');
?>"><?php
      _e('Twitter URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('twitter');
?>" name="<?php
      echo $this->get_field_name('twitter');
?>" type="text" value="<?php
      echo esc_attr($twitter);
?>" /></p>
    
    <p><label for="<?php
      echo $this->get_field_id('facebook');
?>"><?php
      _e('Facebook URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('facebook');
?>" name="<?php
      echo $this->get_field_name('facebook');
?>" type="text" value="<?php
      echo esc_attr($facebook);
?>" /></p>

   <p>
      <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:', 'lilleyplace');
?></label>
      <input class="widefat" id="<?php
      echo $this->get_field_id('instagram'); ?>" name="<?php
      echo $this->get_field_name('instagram');
?>" type="text" value="<?php
      echo esc_attr($instagram);
?>" /></p>
    
    <p><label for="<?php
      echo $this->get_field_id('email');
?>"><?php
      _e('Email Address:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('email');
?>" name="<?php
      echo $this->get_field_name('email');
?>" type="text" value="<?php
      echo esc_attr($email);
?>" /></p>


		<p><label for="<?php
      echo $this->get_field_id('flickr');
?>"><?php
      _e('Flickr URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('flickr');
?>" name="<?php
      echo $this->get_field_name('flickr');
?>" type="text" value="<?php
      echo esc_attr($flickr);
?>" /></p>
        
        <p><label for="<?php
      echo $this->get_field_id('youtube');
?>"><?php
      _e('Youtube URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('youtube');
?>" name="<?php
      echo $this->get_field_name('youtube');
?>" type="text" value="<?php
      echo esc_attr($youtube);
?>" /></p>
        
        <p><label for="<?php
      echo $this->get_field_id('linkedin');
?>"><?php
      _e('LinkedIn URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('linkedin');
?>" name="<?php
      echo $this->get_field_name('linkedin');
?>" type="text" value="<?php
      echo esc_attr($linkedin);
?>" /></p>
        
        <p><label for="<?php
      echo $this->get_field_id('foursquare');
?>"><?php
      _e('FourSquare URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('foursquare');
?>" name="<?php
      echo $this->get_field_name('foursquare');
?>" type="text" value="<?php
      echo esc_attr($foursquare);
?>" /></p>
        
        <p><label for="<?php
      echo $this->get_field_id('delicious');
?>"><?php
      _e('Delicious URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('delicious');
?>" name="<?php
      echo $this->get_field_name('delicious');
?>" type="text" value="<?php
      echo esc_attr($delicious);
?>" /></p>
        
        <p><label for="<?php
      echo $this->get_field_id('digg');
?>"><?php
      _e('Digg URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('digg');
?>" name="<?php
      echo $this->get_field_name('digg');
?>" type="text" value="<?php
      echo esc_attr($digg);
?>" /></p>

<p><label for="<?php
      echo $this->get_field_id('google-plus');
?>"><?php
      _e('Google + URL:', 'lilleyplace');
?></label>
		<input class="widefat" id="<?php
      echo $this->get_field_id('google-plus');
?>" name="<?php
      echo $this->get_field_name('google-plus');
?>" type="text" value="<?php
      echo esc_attr($google_plus);
?>" /></p>



    
<?php
   }
}
add_action('widgets_init', create_function('', 'return register_widget("SocialMediaWidget");'));


/*
===============================================================================

Business Hours Widget

===============================================================================
*/
// Register widget
function tt_load_opening()
{
   register_widget('tt_opening_widget');
}
// Add the function to widgets_init
add_action('widgets_init', 'tt_load_opening');
class tt_opening_widget extends WP_Widget
{
   /* Widget setup */
   function tt_opening_widget()
   {
      // Widget settings
      $widget_ops  = array(
         'classname' => 'opening_widget',
         'description' => __('Use this widget to display your business hours.', 'lilleyplace')
      );
      // Widget control settings
      $control_ops = array(
         'width' => 300,
         'height' => 350,
         'id_base' => 'opening_widget'
      );
      // Create widget
      $this->WP_Widget('opening_widget', __('Business Hours', 'lilleyplace'), $widget_ops, $control_ops);
   }
   /* Display Widget */
   function widget($args, $instance)
   {
      extract($args);
      // The variables from the Widget settings
      $title = apply_filters('widget_title', $instance['title']);
      $mon   = $instance['monday'];
      $tues  = $instance['tuesday'];
      $wed   = $instance['wednesday'];
      $thurs = $instance['thursday'];
      $fri   = $instance['friday'];
      $sat   = $instance['saturday'];
      $sun   = $instance['sunday'];
      // Before widget
      echo $before_widget;
      // Display the widget title if one was added by the user
      if ($title)
         echo $before_title . $title . $after_title;
      // Display Opening Hours widget
   ?>
		<ul class="business-hours">
			<li><span class="day"><?php _e('Monday:','lilleyplace');?></span><span class="hours"><?php echo $mon; ?></span></li>
			<li><span class="day"><?php _e('Tuesday:','lilleyplace');?></span><span class="hours"><?php echo $tues; ?></span></li>
			<li><span class="day"><?php _e('Wednesday:','lilleyplace');?></span><span class="hours"><?php echo $wed; ?></span></li>
			<li><span class="day"><?php _e('Thursday:','lilleyplace');?></span><span class="hours"><?php echo $thurs; ?></span></li>
			<li><span class="day"><?php _e('Friday:','lilleyplace');?></span><span class="hours"><?php echo $fri; ?></span></li>
			<li><span class="day"><?php _e('Saturday:','lilleyplace');?></span><span class="hours"><?php echo $sat; ?></span></li>
			<li><span class="day"><?php _e('Sunday:','lilleyplace');?></span><span class="hours"><?php echo $sun; ?></span></li>
		</ul>
   <?php
      // After widget
      echo $after_widget;
   }
   /* Update Widget */
   function update($new_instance, $old_instance)
   {
      $instance              = $old_instance;
      // Strip tags to remove HTML
      $instance['title']     = strip_tags($new_instance['title']);
      $instance['monday']    = strip_tags($new_instance['monday']);
      $instance['tuesday']   = strip_tags($new_instance['tuesday']);
      $instance['wednesday'] = strip_tags($new_instance['wednesday']);
      $instance['thursday']  = strip_tags($new_instance['thursday']);
      $instance['friday']    = strip_tags($new_instance['friday']);
      $instance['saturday']  = strip_tags($new_instance['saturday']);
      $instance['sunday']    = strip_tags($new_instance['sunday']);
      return $instance;
   }
   /* Widget Settings */
   function form($instance)
   {
      $instance = wp_parse_args((array) $instance, $defaults);
?>
 
      <!-- Widget Title -->
      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
      </p>
 
      <!-- Monday -->
      <p>
         <label for="<?php echo $this->get_field_id('monday'); ?>"><?php _e('Monday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('monday'); ?>" name="<?php echo $this->get_field_name('monday'); ?>" value="<?php echo $instance['monday']; ?>" />
      </p>
 
      <!-- Tuesday -->
      <p>
         <label for="<?php echo $this->get_field_id('tuesday'); ?>"><?php _e('Tuesday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('tuesday'); ?>" name="<?php echo $this->get_field_name('tuesday'); ?>" value="<?php echo $instance['tuesday']; ?>" />
      </p>
 
      <!-- Wednesday -->
      <p>
         <label for="<?php echo $this->get_field_id('wednesday'); ?>"><?php _e('Wednesday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('wednesday'); ?>" name="<?php echo $this->get_field_name('wednesday'); ?>" value="<?php echo $instance['wednesday']; ?>" />
      </p>
 
      <!-- Thursday -->
      <p>
         <label for="<?php echo $this->get_field_id('thursday'); ?>"><?php _e('Thursday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('thursday'); ?>" name="<?php echo $this->get_field_name('thursday'); ?>" value="<?php echo $instance['thursday']; ?>" />
      </p>
 
      <!-- Friday -->
      <p>
         <label for="<?php echo $this->get_field_id('friday'); ?>"><?php _e('Friday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('friday'); ?>" name="<?php echo $this->get_field_name('friday'); ?>" value="<?php echo $instance['friday']; ?>" />
      </p>
 
      <!-- Saturday -->
      <p>
         <label for="<?php echo $this->get_field_id('saturday'); ?>"><?php _e('Saturday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('saturday'); ?>" name="<?php echo $this->get_field_name('saturday'); ?>" value="<?php echo $instance['saturday']; ?>" />
      </p>
 
        <!-- Sunday -->
      <p>
         <label for="<?php echo $this->get_field_id('sunday'); ?>"><?php _e('Sunday:', 'lilleyplace'); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id('sunday'); ?>" name="<?php echo $this->get_field_name('sunday'); ?>" value="<?php echo $instance['sunday']; ?>" />
      </p>
 
      <?php
   }
}

/*
===============================================================================

Affiliates Widget

===============================================================================
*/

add_action( 'widgets_init', create_function( '', 'register_widget("pu_media_upload_widget");' ) );

class pu_media_upload_widget extends WP_Widget
{
   /**
   * Constructor
   **/
   public function __construct()
   {
      $widget_ops = array(
         'classname' => 'pu_media_upload',
         'description' => __('Use this widget to display your affiliate\'s logos.', 'lilleyplace')
      );

      parent::__construct( 'pu_media_upload', __('Affiliates', 'lilleyplace'), $widget_ops );

      add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
   }

   /**
   * Upload the Javascripts for the media uploader
   */
   public function upload_scripts()
   {
      wp_enqueue_script('media-upload');
      wp_enqueue_script('thickbox');

      wp_enqueue_style('thickbox');
   }

      /**
      * Outputs the HTML for this widget.
      *
      * @param array  An array of standard parameters for widgets in this theme
      * @param array  An array of settings for this widget instance
      * @return void Echoes it's output
      **/
      public function widget( $args, $instance )
      {
      extract($args);
      // The variables from the Widget settings
      $title   = apply_filters('widget_title', $instance['title']);
      $image1  = $instance['image1'];
      $image2  = $instance['image2'];
      $image3  = $instance['image3'];
      $image4  = $instance['image4'];

      // Before widget
      echo $before_widget;
      // Display the widget title if one was added by the user
      if ($title)
         echo $before_title . $title . $after_title;
      // Display Opening Hours widget
      ?>
      <ul class="small-block-grid-2 medium-block-grid-1 affiliates">
         <?php if ($image1) { ?>
         <li><img src="<?php echo $image1; ?>" width="141" height="60" alt="" /></li>
         <?php } ?>
         <?php if ($image2) { ?>
         <li><img src="<?php echo $image2; ?>" width="141" height="60" alt="" /></li>
         <?php } ?>
         <?php if ($image3) { ?>
         <li><img src="<?php echo $image3; ?>" width="141" height="60" alt="" /></li>
         <?php } ?>
         <?php if ($image4) { ?>
         <li><img src="<?php echo $image4; ?>" width="141" height="60" alt="" /></li>
         <?php } ?>
      </ul>
      <?php
      // After widget
      echo $after_widget;
      }

   /**
   * Deals with the settings when they are saved by the admin. Here is
   * where any validation should be dealt with.
   *
   * @param array  An array of new settings as submitted by the admin
   * @param array  An array of the previous settings
   * @return array The validated and (if necessary) amended settings
   **/
   public function update( $new_instance, $old_instance ) {

      // update logic goes here
      $updated_instance = $new_instance;
      return $updated_instance;
   }

   /**
   * Displays the form for this widget on the Widgets page of the WP Admin area.
   *
   * @param array  An array of the current settings for this widget
   * @return void
   **/
   public function form( $instance )
   {
      $title = __('Affiliates', 'lilleyplace');
      if(isset($instance['title']))
      {
         $title = $instance['title'];
      }

      $image1 = '';
      if(isset($instance['image1']))
      {
         $image1 = $instance['image1'];
      }
      $image2 = '';
      if(isset($instance['image2']))
      {
         $image2 = $instance['image2'];
      }
      $image3 = '';
      if(isset($instance['image3']))
      {
         $image3 = $instance['image3'];
      }
      $image4 = '';
      if(isset($instance['image4']))
      {
         $image4 = $instance['image4'];
      }
      ?>
      <script>
         jQuery(document).ready(function($) {
            $(document).on("click", ".upload_image_button", function() {

               jQuery.data(document.body, 'prevElement', $(this).prev());

               window.send_to_editor = function(html) {
                  var imgurl = jQuery('img',html).attr('src');
                  var inputText = jQuery.data(document.body, 'prevElement');

                  if(inputText != undefined && inputText != '')
                     {
                        inputText.val(imgurl);
                     }

                     tb_remove();
               };

               tb_show('', 'media-upload.php?type=image&TB_iframe=true');
               return false;
            });
         });
      </script>
      <p>
         <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'lilleyplace' ); ?></label>
         <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_name( 'image1' ); ?>"><?php _e( 'Image 1:', 'lilleyplace' ); ?></label>
         <input name="<?php echo $this->get_field_name( 'image1' ); ?>" id="<?php echo $this->get_field_id( 'image1' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image1 ); ?>" />
         <input class="upload_image_button" type="button" value="<?php _e( 'Upload Image', 'lilleyplace' ); ?>" />
      </p>
      <p>
         <label for="<?php echo $this->get_field_name( 'image2' ); ?>"><?php _e( 'Image 2:', 'lilleyplace' ); ?></label>
         <input name="<?php echo $this->get_field_name( 'image2' ); ?>" id="<?php echo $this->get_field_id( 'image2' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image2 ); ?>" />
         <input class="upload_image_button" type="button" value="<?php _e( 'Upload Image', 'lilleyplace' ); ?>" />
      </p>
      <p>
         <label for="<?php echo $this->get_field_name( 'image3' ); ?>"><?php _e( 'Image 3:', 'lilleyplace' ); ?></label>
         <input name="<?php echo $this->get_field_name( 'image3' ); ?>" id="<?php echo $this->get_field_id( 'image3' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image3 ); ?>" />
         <input class="upload_image_button" type="button" value="<?php _e( 'Upload Image', 'lilleyplace' ); ?>" />
      </p>
      <p>
         <label for="<?php echo $this->get_field_name( 'image4' ); ?>"><?php _e( 'Image 4:', 'lilleyplace' ); ?></label>
         <input name="<?php echo $this->get_field_name( 'image4' ); ?>" id="<?php echo $this->get_field_id( 'image4' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image4 ); ?>" />
         <input class="upload_image_button" type="button" value="<?php _e( 'Upload Image', 'lilleyplace' ); ?>" />
      </p>
   <?php
   }
}

/*
===============================================================================

Google Maps Widget

===============================================================================
*/

class google_maps_widget extends WP_Widget {
 
   public function __construct() {
      $widget_ops = array('classname' => 'google_maps_widget', 'description' => 'Displays a Google Maps image when clicked on displays a pop up modal!' );
      $this->WP_Widget('google_maps_widget', 'Google Maps Widget', $widget_ops);
   }
 
   function widget($args, $instance) {
      // PART 1: Extracting the arguments + getting the values
      extract($args, EXTR_SKIP);
      $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
      $zoom = empty($instance['zoom_level']) ? '' : $instance['zoom_level'];
      $add = empty($instance['address']) ? '' : $instance['address'];
      $info = empty($instance['information']) ? '' : $instance['information'];
 
   // Before widget code, if any
   echo (isset($before_widget)?$before_widget:'');

      // Display the widget title if one was added by the user
      if ($title)
         echo $before_title . $title . $after_title;
   // Display Opening Hours widget
   
   // PART 2: The title and the text output
   ?>
		<a href="#" data-reveal-id="google-maps-modal" title="<?php _e('Click to open larger map','lilleyplace');?>">
         <div id='SGM'>
            <img alt="<?php _e('Click to open larger map','lilleyplace');?>" title="<?php _e('Click to open larger map','lilleyplace');?>" src="//maps.googleapis.com/maps/api/staticmap?center=<?php echo $add; ?>+&amp;zoom=<?php echo $zoom; ?>&amp;size=250x250&amp;maptype=roadmap&amp;scale=2&amp;markers=size:default%7Ccolor:red%7Clabel:A%7C<?php echo $add; ?>+&amp;language=en&amp;visual_refresh=false">
            <div class="SGM-overlay">
               <span><?php _e('Click to open larger map','lilleyplace');?></span>
            </div>
         </div>
      </a>
		<div id="google-maps-modal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		  <h2><?php echo $title; ?></h2>
		  <p class="lead"><?php echo $info; ?></p>
		  <iframe src="//maps.google.com/maps?hl=en&amp;ie=utf8&amp;output=embed&amp;iwloc=addr&amp;iwd=1&amp;mrt=loc&amp;t=m&amp;q=<?php echo $add; ?>+&amp;z=14" frameborder="0"></iframe>
		  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
   <?php
   
   // After widget code, if any  
   echo (isset($after_widget)?$after_widget:'');
   }
 
   public function form( $instance ) {
   
      // PART 1: Extract the data from the instance variable
      $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
      $title = $instance['title'];
      $zoom = $instance['zoom_level'];
      $add = $instance['address'];
      $info = $instance['information'];
   
      // PART 2-3: Display the fields
   ?>
      <!-- PART 2: Widget Title field START -->
         <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'lilleyplace'); ?>
              <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
         </p>
      <!-- Widget Title field END -->
   
      <!-- PART 3: Zoom Level field START -->
         <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Zoom Level:', 'lilleyplace'); ?>
              <select class='widefat' id="<?php echo $this->get_field_id('zoom_level'); ?>"
                      name="<?php echo $this->get_field_name('zoom_level'); ?>" type="text">
                  <option value='0'<?php echo ($zoom=='0')?'selected':''; ?>>0 - <?php _e('entire world', 'lilleyplace'); ?></option>
                  <option value='1'<?php echo ($zoom=='1')?'selected':''; ?>>1</option>
                  <option value='2'<?php echo ($zoom=='2')?'selected':''; ?>>2</option>
                  <option value='3'<?php echo ($zoom=='3')?'selected':''; ?>>3</option>
                  <option value='4'<?php echo ($zoom=='4')?'selected':''; ?>>4</option>
                  <option value='5'<?php echo ($zoom=='5')?'selected':''; ?>>5</option>
                  <option value='6'<?php echo ($zoom=='6')?'selected':''; ?>>6</option>
                  <option value='7'<?php echo ($zoom=='7')?'selected':''; ?>>7</option>
                  <option value='8'<?php echo ($zoom=='8')?'selected':''; ?>>8</option>
                  <option value='9'<?php echo ($zoom=='9')?'selected':''; ?>>9</option>
                  <option value='10'<?php echo ($zoom=='10')?'selected':''; ?>>10</option>
                  <option value='11'<?php echo ($zoom=='11')?'selected':''; ?>>11</option>
                  <option value='12'<?php echo ($zoom=='12')?'selected':''; ?>>12</option>
                  <option value='13'<?php echo ($zoom=='13')?'selected':''; ?>>13</option>
                  <option value='14'<?php echo ($zoom=='14')?'selected':''; ?>>14</option>
                  <option value='15'<?php echo ($zoom=='15')?'selected':''; ?>>15</option>
                  <option value='16'<?php echo ($zoom=='16')?'selected':''; ?>>16</option>
                  <option value='17'<?php echo ($zoom=='17')?'selected':''; ?>>17</option>
                  <option value='18'<?php echo ($zoom=='18')?'selected':''; ?>>18</option>
                  <option value='19'<?php echo ($zoom=='19')?'selected':''; ?>>19</option>
                  <option value='20'<?php echo ($zoom=='20')?'selected':''; ?>>20</option>
      	         <option value='21'<?php echo ($zoom=='21')?'selected':''; ?>>21</option>
              	</select>
            </label>
         </p>
      <!-- Zoom Level field END -->

   	<!-- PART 5: Address field START -->
         <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'lilleyplace'); ?>
               <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($add); ?>" />
            </label>
         </p>
      <!-- Address field END -->

      <!-- PART 6: Information field START -->
         <p>
            <label for="<?php echo $this->get_field_id('information'); ?>"><?php _e('Information:', 'lilleyplace'); ?>
            	<textarea name="<?php echo $this->get_field_name('information'); ?>" class="widefat" id="<?php echo $this->get_field_id('information'); ?>"><?php echo esc_attr($info); ?></textarea>
            </label>
         </p>
      <!-- Information field END -->
      <?php
   
   }
 
   function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = $new_instance['title'];
      $instance['zoom_level'] = $new_instance['zoom_level'];
   	$instance['address'] = $new_instance['address'];
   	$instance['information'] = $new_instance['information'];
      return $instance;
   }
 
}
 
add_action( 'widgets_init', create_function('', 'return register_widget("google_maps_widget");') );

/*
===============================================================================

Contact Details Widget

===============================================================================
*/
// Register widget
function tt_load_contact_widget()
{
   register_widget('tt_contact_widget');
}
// Add the function to widgets_init
add_action('widgets_init', 'tt_load_contact_widget');
class tt_contact_widget extends WP_Widget
{
   /* Widget setup */
   function tt_contact_widget()
   {
      // Widget settings
      $widget_ops  = array(
         'classname' => 'contact_widget',
         'description' => __('Use this widget to display your contact details.', 'lilleyplace')
      );
      // Widget control settings
      $control_ops = array(
         'width' => 300,
         'height' => 350,
         'id_base' => 'contact_widget'
      );
      // Create widget
      $this->WP_Widget('contact_widget', __('Contact Details', 'lilleyplace'), $widget_ops, $control_ops);
   }
   /* Display Widget */
   function widget($args, $instance)
   {
      extract($args);
      // The variables from the Widget settings
      $title   = apply_filters('widget_title', $instance['title']);
      $address = $instance['address'];
      $city_state = $instance['city_state'];
      $phone   = $instance['phone'];
      $fax     = $instance['fax'];
      $email   = $instance['email'];
      // Before widget
      echo $before_widget;
      // Display the widget title if one was added by the user
      if ($title)
         echo $before_title . $title . $after_title;
      // Display Opening Hours widget
?>
<ul class="vcard">
   <?php if( $address ): ?>
	<li class="address"><?php echo $address.'<br />'.$city_state; ?></li>
   <?php endif; ?>
   <?php if( $phone ): ?>
	<li class="phone"><strong><?php _e('phone:','lilleyplace'); ?></strong>&nbsp;<?php echo '<a href="tel:'.$phone.'">'.$phone.'</a>'; ?></li>
   <?php endif; ?>
   <?php if( $fax ): ?>
	<li class="fax"><strong><?php _e('fax:','lilleyplace'); ?></strong>&nbsp;<?php echo $fax; ?></li>
   <?php endif; ?>
   <?php if( $email ): ?>
	<li class="email"><strong><?php _e('email:','lilleyplace'); ?></strong>&nbsp;<?php echo '<a href="mailto:'.$email.'">'.$email.'</a>'; ?></li>
   <?php endif; ?>
</ul>
        <?php
      // After widget
      echo $after_widget;
   }
   /* Update Widget */
   function update($new_instance, $old_instance)
   {
      $instance            = $old_instance;
      // Strip tags to remove HTML
      $instance['title']   = strip_tags($new_instance['title']);
      $instance['address'] = strip_tags($new_instance['address']);
   $instance['city_state'] = strip_tags($new_instance['city_state']);
      $instance['phone']   = strip_tags($new_instance['phone']);
      $instance['fax']     = strip_tags($new_instance['fax']);
      $instance['email']   = strip_tags($new_instance['email']);
      return $instance;
   }
   /* Widget Settings */
   function form($instance)
   {
      $instance = wp_parse_args((array) $instance, $defaults);
?>
 
        <!-- Widget Title -->
        <p>
            <label for="<?php
      echo $this->get_field_id('title');
?>"><?php
      _e('Title:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('title');
?>" name="<?php
      echo $this->get_field_name('title');
?>" value="<?php
      echo $instance['title'];
?>" />
        </p>
 
        <!-- Address -->
        <p>
            <label for="<?php
      echo $this->get_field_id('address');
?>"><?php
      _e('Street Address:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('address');
?>" name="<?php
      echo $this->get_field_name('address');
?>" value="<?php
      echo $instance['address'];
?>" />
        </p>
        
        <!-- City, State, Zip -->
        <p>
            <label for="<?php
      echo $this->get_field_id('city_state');
?>"><?php
      _e('City, State, Zipcode:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('city_state');
?>" name="<?php
      echo $this->get_field_name('city_state');
?>" value="<?php
      echo $instance['city_state'];
?>" />
        </p>
 
        <!-- Phone -->
        <p>
            <label for="<?php
      echo $this->get_field_id('phone');
?>"><?php
      _e('Phone:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('phone');
?>" name="<?php
      echo $this->get_field_name('phone');
?>" value="<?php
      echo $instance['phone'];
?>" />
        </p>
 
        <!-- Fax -->
        <p>
            <label for="<?php
      echo $this->get_field_id('fax');
?>"><?php
      _e('Fax:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('fax');
?>" name="<?php
      echo $this->get_field_name('fax');
?>" value="<?php
      echo $instance['fax'];
?>" />
        </p>
 
        <!-- Email -->
        <p>
            <label for="<?php
      echo $this->get_field_id('email');
?>"><?php
      _e('Email:', 'lilleyplace');
?></label>
 
            <input type="text" class="widefat" id="<?php
      echo $this->get_field_id('email');
?>" name="<?php
      echo $this->get_field_name('email');
?>" value="<?php
      echo $instance['email'];
?>" />
        </p>
 
 
        <?php
   }
}


?>
