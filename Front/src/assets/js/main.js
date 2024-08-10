jQuery(function ($) {
  'use strict';
  $(document).on('init', function() {
    /****======  newsLetter_popup ??????? ======*******/
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

    /****======  niceSelect  ======*******/
    if ($("select").length) {
      $("select").niceSelect();
    };

    /****====== Magnific popup_link ???????? ======*******/
    if ($(".popup_link").length) {
      $(".popup_link").magnificPopup({
        type: "inline",
        midClick: true,
        mainClass: "mfp-fade"
      });
    };

    /****====== Magnific popup video ??????? ======*******/
    if ($(".video-popup").length) {
      $(".video-popup").magnificPopup({
        type: 'iframe'
      });
    };
  })
}(jQuery));