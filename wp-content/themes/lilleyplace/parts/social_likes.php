<?php
/**
 * The default template for the social likes
 *
 */
?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
<div class="share">
    <div class="facebook">
        <div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
    <div class="twitter">
        <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>"><?php _e( 'Tweet', 'lilleyplace' ); ?></a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
    <div class="google">
        <div class="g-plusone"></div>
        <script type="text/javascript">
          window.___gcfg = {lang: 'en-GB'};
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
    </div>
    <div class="pinterest">    
        <?php if ( '' != get_the_post_thumbnail() ) { ?>
        <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php echo $url ?>&description=<?php the_title(); ?>"
            data-pin-do="buttonPin"
            data-pin-config="above">
            <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
        </a>
        <?php } else { ?>
        <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php echo get_template_directory_uri(); ?>/assets/img/images/blog_normal.jpg&description=<?php the_title(); ?>"
            data-pin-do="buttonPin"
            data-pin-config="above">
            <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
        </a>
        <?php } ?>
        <!-- Please call pinit.js only once per page -->
        <script type="text/javascript">
        (function(d){
            var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
            p.type = 'text/javascript';
            p.async = true;
            p.src = '//assets.pinterest.com/js/pinit.js';
            f.parentNode.insertBefore(p, f);
        }(document));
        </script>
    </div>
</div>