import $ from 'jquery';
import jQuery from 'jquery';

(function ($) {
  "use strict";

  // menu fixed js code
  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 50) {
      $('.main_menu').addClass('menu_fixed animated fadeInDown');
    } else {
      $('.main_menu').removeClass('menu_fixed animated fadeInDown');
    }
  });

var review = $('.client_review_part');
if (review.length) {
  review.owlCarousel({
    items: 1,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    smartSpeed: 2000,
  });
}

  // let questionRanges = $('.question-range');
  // if(Array.isArray(questionRanges)){
  //   for (const item of questionRanges) {
  //     $(item).change((e)=>{
  //       console.log('range');
  //       // let value = $(e.currentTarget).val();
  //       $(e.currentTarget).next('.question-range-output').val($(e.currentTarget).val());
  //     });
  //   }
  // }
  // else{
  //   console.log('range');
  //   $(questionRanges).on('input change',(e)=>{
  //     console.log('range');
  //     // let value = $(e.currentTarget).val();
  //     $(e.currentTarget).next('.question-range-output').val($(e.currentTarget).val());
  //   });
  // }

 

}(jQuery));