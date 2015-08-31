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
    <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
    <script type="IN/Share" data-url="<?php the_permalink() ?>" data-counter="right"></script>
    <div class="pinterest">    
        <?php if ( '' != get_the_post_thumbnail() ) { ?>
        <a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url; ?>&description=<?php rawurlencode(the_title()); ?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red">
            <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" alt="Pin It" />
        </a>
        <?php } else { ?>
        <a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo get_template_directory_uri(); ?>/assets/img/images/blog-normal.jpg&description=<?php rawurlencode(the_title()); ?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red">
            <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" alt="Pin It" />
        </a>
        <?php } ?>
        <!-- Please call pinit.js only once per page -->
        <script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
    </div>
</div>