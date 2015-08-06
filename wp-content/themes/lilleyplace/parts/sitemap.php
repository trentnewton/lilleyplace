<?php
/**
 * The default template for the sitemap
 *
 */
?>
<div class="row">
  <div class="columns medium-4">
    <h2 id="pages"><?php _e( 'Pages', 'lilleyplace' ); ?></h2>
    <ul>
      <?php
      // Add pages you'd like to exclude in the exclude here
      $page = get_page_by_title('Sitemap');
      wp_list_pages(
        array(
          'exclude' => $page->ID,
          'title_li' => '',
        ),
        'sort_column=menu_order'
      );
      ?>
    </ul>
  </div>
  <div class="columns medium-4">
    <h2 id="posts"><?php _e( 'Posts', 'lilleyplace' ); ?></h2>
    <ul>
      <?php
      // Add categories you'd like to exclude in the exclude here
      $cats = get_categories('exclude=');
      foreach ($cats as $cat) {
        echo "<li><h6>".$cat->cat_name."</h6>";
        echo "<ul>";
        $archive_query = new WP_Query('posts_per_page=-1&cat='.$cat->cat_ID);
        while ($archive_query->have_posts()) {
          $archive_query->the_post();
          $category = get_the_category();
          // Only display a post link once, even if it's in multiple categories
          if ($category[0]->cat_ID == $cat->cat_ID) {
            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
          }
        }
        echo "</ul>";
        echo "</li>";
      }
      ?>
    </ul>
  </div>
  <div class="columns medium-4">
    <h2 id="authors"><?php _e( 'Authors', 'lilleyplace' ); ?></h2>
    <ul>
      <?php
      wp_list_authors(
        array(
          'exclude_admin' => false,
        )
      );
      ?>
    </ul>
  </div>
</div>