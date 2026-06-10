
$(document).scroll(function() {
    var i = $(this).scrollTop();
    if (i > 100) {
      $('.wppBtn').fadeIn();
    } else {
      $('.wppBtn').fadeOut();
    }
  });