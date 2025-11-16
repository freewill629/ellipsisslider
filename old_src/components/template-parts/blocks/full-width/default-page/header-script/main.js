// $(document).ready(function() {
//     $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
//         disableOn: 700,
//         type: "iframe",
//         mainClass: "mfp-fade",
//         removalDelay: 160,
//         preloader: false,

//         fixedContentPos: false,
//     });
// });

window.onload = function () {
  var elems = document.getElementsByClassName("announcement-bar");

  if(elems.length > 0){
    document.getElementById("close").onclick = function () {
      for (var i = 0; i < elems.length; i += 1) {
        elems[i].style.display = "none";
      }
      setCookie("announcement-bar", "true", 7);
    };
}
};

$(document).ready(function () {
  // team slider

  var body = document.querySelector('body');
  body.classList.add('onload');

  $(".team-slider__row").slick({
    dots: true,
    arrows: true,
    prevArrow:
      '<div class="prev-arrow"><i class="fas fa-angle-left"></i></div>',
    nextArrow:
      '<div class="next-arrow"><i class="fas fa-angle-right"></i></div>',
  });

  // $(".testimonial").slick({
  //   dots: true,
  //   arrows: false,
  // });

  $(".position-select").select2();


  // main menu
  // Add class on parent which 'li' children has submenu
  $("ul.submenu").parents("li").addClass("megamenu");

  $(document).on("click", ".position-select", function () {
    var option = jQuery("#selectCourse option:selected").val();
    console.log("testing");

    alert("test");
    console.log(option);
  });

  //Menu ICon Append prepend for responsive
  $(window)
    .on("resize", function () {
      if ($(window).width() < 1024) {
        if (!$("#menu_trigger").length) {
          $("#mainmenu").prepend(
            '<a href="#" id="menu_trigger" class="menulines-button"><div class="menulines"><span><i class="fas fa-bars"></i><strong>Menu</strong></span></div></a>'
          );
        }
        if (!$(".navtrigger").length) {
          $(".megamenu > a").addClass("navtrigger");
          //$('.navtrigger').append('<i class="fas fa-angle-double-right"></i>');
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
        //$('.navtrigger').remove();
        $(".h_menu").unwrap(".mobile-menu");
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

  if($("#selectCourse").length){
  $("#selectCourse").on("change", function () {
    var target = $(this).val();
    //  alert(target);
    var tar = $("#" + target);
    // target = target.length ? target : $("[name=" + this.hash.substr(1) + "]");
    if (tar.length) {
      $("html,body").animate(
        {
          scrollTop: tar.offset().top,
        },
        100
      );
      return false;
    }
  });
}
}); 
// window.addEventListener('load', function() {
//   var body = document.querySelector('body');
//   body.classList.add('onload');
// });

$(document).ready(function () {
    $("#close").click(function () {
      $(".announcement-bar").hide();
    });
    $(".testimonial").slick({
      dots: true,
      arrows: false,
    });
    $(".testimonial-block").slick({
      dots: true,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  });


  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}
function eraseCookie(name) {
  document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}


 