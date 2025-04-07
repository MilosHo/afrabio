$(document).ready(function() {
  var $d = $(this);
  $(window).on('load resize', function() {
    var $w = $(this);
    if ($d.width() > 767) {
      $(".top_menu > ul.menu").removeClass("toogle_content");
    } else {
      $(".top_menu > ul.menu").addClass("toogle_content");
    }
  });
});