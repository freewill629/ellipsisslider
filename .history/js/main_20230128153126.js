$(document).ready(function () {
  // team slider

  $(".team-slider__row").slick({
    dots: true,
    arrows: true,
    prevArrow:
      '<div class="prev-arrow"><i class="fas fa-angle-left"></i></div>',
    nextArrow:
      '<div class="next-arrow"><i class="fas fa-angle-right"></i></div>',
  });

  // main menu
  // Add class on parent which 'li' children has submenu
  $("ul.submenu").parents("li").addClass("megamenu");

  //Menu ICon Append prepend for responsive
  $(window)
    .on("resize", function () {
      if ($(window).width() < 1024) {
        if (!$("#menu_trigger").length) {
          $("#mainmenu").prepend(
            '<a href="#" id="menu_trigger" class="menulines-button"><span class="menulines"></span></a>'
          );
        }
        if (!$(".navtrigger").length) {
          $(".megamenu > a").addClass("navtrigger");
          $(".navtrigger").append('<i class="fas fa-angle-double-right"></i>');
        }
        if (!$(".mobile-menu").length) {
          $(".h_menu").wrap('<div class="mobile-menu"></div>');
        }
        if (!$(".submenu > .backmenu-row").length) {
          $(".submenu").each(function () {
            var subvalue = $(this).prev("a").text();
            //$(this).prepend('<a href="#" class="back-trigger">'+subvalue+'</a>');
            $(this).prepend(
              '<div class="backmenu-row"><a href="#" class="back-trigger"></a><em>' +
                subvalue +
                "</em></div>"
            );
          });
        }
      } else {
        $("#menu_trigger").remove();
        $(".navtrigger").remove();
        $(".menu").unwrap(".mobile-menu");
        $(".back-trigger").remove();
        $(".back-trigger").remove();
      }
    })
    .resize();

  // Mobile menu on click open
  $(document).on("click", "#menu_trigger", function () {
    $("body").toggleClass("overlay");
    if ($(".megamenu").hasClass("sub-open")) {
      $(".megamenu ").removeClass("sub-open");
      $(".mobile-menu").toggle("slide");
      $(this).toggleClass("menuopen");
      $(".mobile-menu").toggleClass("slide");
    } else {
      $(this).toggleClass("menuopen");
      $(".mobile-menu").toggleClass("slide");
      $(this).next(".mobile-menu").toggle("slide");
    }
    return false;
  });

  // While open submenu add class
  $(document).on("click", ".navtrigger", function () {
    $(this).parents("li").addClass("sub-open");
    return false;
  });

  // Back to menu in mobile
  $(document).on("click", ".back-trigger", function () {
    $(this).closest("li").removeClass("sub-open");
    return false;
  });

  // career page div on click show

  jQuery(".center-content-module__tab_module h3 a").on("click", function () {
    jQuery(".sales-items").toggle();
  });
});
