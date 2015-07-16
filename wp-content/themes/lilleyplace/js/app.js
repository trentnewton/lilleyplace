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