// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

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