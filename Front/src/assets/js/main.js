jQuery(function ($) {
  'use strict';
  $(document).on('init', function() {
    /****======  newsLetter_popup ======*******/
    let selector = $(".modal-btn");
    selector.magnificPopup({
      type: "inline",
      closeBtnInside: true,
      autoFocusLast: true,
      focus: ".modal-title",
    });
    selector.click();

    /****======  Active class add Remove  ======*******/
    $(".menubar").on("click", function () {
      $(".mobile-menu__sidebar-menu ").addClass("active");
      $(".menu-closer").addClass("active");
    });
    $(".search-box.menu").on("click", function () {
      $(".search-box-popup").addClass("active");
    });
    $(".search-box-close").on("click", function () {
      $(".search-box-popup").removeClass("active");
    });
    $(".menu-closer").on("click", function () {
      $(".mobile-menu__sidebar-menu ").removeClass("active");
      $(".menu-closer").removeClass("active");
    });
    $(".mobile-menu__sidebar-menu .dropdown-list .menuarrow").on("click", function () {
      $(this).parent().parent().find(".dropdown").toggle(300);
      $(this).parent().parent().toggleClass("active");
    });
    $(".mobile-menu__sidebar-menu .dropdown .menuarrowtwo").on("click", function () {
      $(this).parent().parent().find(".subdropdown").toggle(300);
      $(this).parent().parent().toggleClass("active");
    });
    $(".cart-icon").on("click", function () {
      $(".side-cart").addClass("active");
      $(".side-cart-closer").addClass("active");
    });
    $(".cart-close").on("click", function () {
      $(".side-cart").removeClass("active");
      $(".side-cart-closer").removeClass("active");
    });
    $(".menubar").on("click", function () {
      $(".sidebar-content").addClass("active");
      $(".sidebar-content-closer").addClass("active");
    });
    $(".close-side-widget").on("click", function () {
      $(".sidebar-content").removeClass("active");
    });
    $(".sidebar-content-closer").on("click", function () {
      $(".sidebar-content-closer").removeClass("active");
      $(".sidebar-content").removeClass("active");
    });
    $(".close-side-widget").on("click", function () {
      $(".sidebar-content-closer").removeClass("active");
    });
    $(".side-cart-closer").on("click", function () {
      $(".side-cart").removeClass("active");
      $(".side-cart-closer").removeClass("active");
    });
    $(".slidebarfilter, .remove-sidebar").on("click", function () {
      $(".shop-grid-sidebar").toggleClass("active");
    });
    $(".varients li button").on("click", function () {
      $(".varients li button").removeClass("active");
      $(this).addClass("active");
    });
    if ($(".insta-slider").length) {
      $(".insta-slider").magnificPopup({
        delegate: 'a',
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
          opener: function (openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
      });
    };
    if ($(".single-product-three .single-item").length) {
      $(".single-product-three .single-item").magnificPopup({
        delegate: 'a',
        type: 'image'
      });
    };

    /****======  niceSelect  ======*******/
    if ($("select").length) {
      $("select").niceSelect();
    };

    /****======  Wow  ======*******/
    new WOW().init();

    /****====== Magnific popup_link  ======*******/
    if ($(".popup_link").length) {
      $(".popup_link").magnificPopup({
        type: "inline",
        midClick: true,
        mainClass: "mfp-fade"
      });
    };

    /****====== Magnific popup video ======*******/
    if ($(".video-popup").length) {
      $(".video-popup").magnificPopup({
        type: 'iframe'
      });
    };

    /****====== MIXitup ======*******/
    if ($(".products-grid").length) {
      $('#grid').mixItUp();
    };

    /****======  Jquery tabs  ======*******/
    $(".tabs").tabs({
      neighbors: {
        prev: $("button.prev"),
        next: $("button.next")
      }
    });

    /****====== banner-one TweenMax Js  ======*******/
    if ($(".banner-one__single-slide").length) {
      $(".banner-one__single-slide").on("mousemove", function (e) {
        parallaxIt(e, ".banner-one__slideimg_two", -20);
        parallaxIt(e, ".banner-one__shape1", 10);
        parallaxIt(e, ".banner-one__shape2", 15);
        parallaxIt(e, ".banner-one__shape3", 25);
      });

      function parallaxIt(e, target, movement) {
        var $this = $(".banner-one__single-slide");
        var relX = e.pageX - $this.offset().left;
        var relY = e.pageY - $this.offset().top;

        TweenMax.to(target, 1, {
          x: (relX - $this.width() / 2) / $this.width() * movement,
          y: (relY - $this.height() / 2) / $this.height() * movement
        });
      }
    };

    /****====== upcoming-item TweenMax Js  ======*******/
    if ($(".upcoming-item").length) {
      $(".upcoming-item").on("mousemove", function (e) {
        parallaxIt(e, ".upcoming-item__signature", -50);
      });

      function parallaxIt(e, target, movement) {
        var $this = $(".upcoming-item");
        var relX = e.pageX - $this.offset().left;
        var relY = e.pageY - $this.offset().top;

        TweenMax.to(target, 1, {
          x: (relX - $this.width() / 2) / $this.width() * movement,
          y: (relY - $this.height() / 2) / $this.height() * movement
        });
      }
    };

    /* password show hide on form field  */
    if ($(".eye .icon-2").length) {
      $(".eye .icon-2").click(function () {
        var x = document.getElementById("password-field");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        $(this).hide();
        $(".eye .icon-1").css("display", "block");
      });
    };

    if ($(".eye .icon-1").length) {
      $(".eye .icon-1").click(function () {
        var x = document.getElementById("password-field");
        if (x.type === "text") {
          x.type = "password";
        } else {
          x.type = "text";
        }
        $(this).hide();
        $(".eye .icon-2").css("display", "block");
      });
    };
  })
}(jQuery));