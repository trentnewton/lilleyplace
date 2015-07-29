// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$('#info-box-accordion').on('toggled', function (event, accordion) {
  $(document).foundation('equalizer', 'reflow');
});

// Scroll to top thingo
$('#top').click(function() {
  $('html, body').animate({
    scrollTop : 0
  }, 800);
  return false;
});

/*----------------------------------------------------*/
/*  Add preloader gif to contact form
/*----------------------------------------------------*/
var _wpcf7 = {"loaderUrl":templateUrl + "/assets/img/images/preloader.gif","sending":"Sending...","cached":"1"};

/*----------------------------------------------------*/
/*  Slick Slider settings
/*----------------------------------------------------*/

$('.slider').slick({
  dots: false,
  centerMode: true,
  infinite: true,
  speed: 1200,
  autoplay: true,
  slidesToShow: 4,
  variableWidth: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        centerMode: true,
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 4,
        centerMode: true,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

/*----------------------------------------------------*/
/*  Ajax Comments
/*----------------------------------------------------*/

$(document).ready(function($){
    // Get the comment form
    var commentform=$('#commentform');
    // Add a Comment Status message
    commentform.prepend('<div id="comment-status" ></div>');
    // Defining the Status message element 
    var statusdiv=$('#comment-status');
    commentform.submit(function(){
      // Serialize and store form data
      var formdata=commentform.serialize();
      //Add a status message
      statusdiv.html('<img class="ajax-loader" src="' + templateUrl + '/assets/img/images/preloader.gif" alt="Processing...">');
      //Extract action URL from commentform
      var formurl=commentform.attr('action');
      //Post Form with data
      $.ajax({
        type: 'post',
        url: formurl,
        data: formdata,
        error: function(XMLHttpRequest, textStatus, errorThrown){
          statusdiv.html('<div role="alert" style="display: block;" class="wpcf7-response-output wpcf7-validation-errors">You might have left one of the fields blank, or be posting too quickly</div>');
        },
        success: function(data, textStatus){
          if(data=="success")
            statusdiv.html('<div role="alert" style="display: block;" class="wpcf7-response-output wpcf7-mail-sent-ok">Thanks for your comment. We appreciate your response</div>');
          else
            statusdiv.html('<div role="alert" style="display: block;" class="wpcf7-response-output wpcf7-mail-sent-ng">Some errors occurred while posting your comment</div>');
            commentform.find('textarea[name=comment]').val('');
        }
      });
      return false;
    });
});

$(document).foundation({
  accordion: {
    // specify the class used for accordion panels
    content_class: 'content',
    // specify the class used for active (or open) accordion panels
    active_class: 'active',
    // allow multiple accordion panels to be active at the same time
    multi_expand: true,
    // allow accordion panels to be closed by clicking on their headers
    // setting to false only closes accordion panels when another is opened
    toggleable: true
  }
});
