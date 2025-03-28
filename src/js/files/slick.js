import "../../scss/base/slick.scss";

$(document).ready(function () {
  $('.slider').slick( {
    arrows: true,
    adaptiveHeight: true,
    dots: true,
    slidesToShow: 5,
    slidesToScroll: 3,
    speed: 100,
    easing: 'linear',
    infinity: false,
    initialSlide: 0,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnFocus: true,
    pauseOnHover: true,
    pauseOnDotsHover: true,
    draggable: false,
    touchThreshold: 10,
    rows: 1,
    slidesPerRow: 1,
    centerMode: true,
    variableWidth: true,
    asNavFor: '.sliderbig',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 5,
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,

        }
      }
    ],
  });
  $('.sliderbig').slick({
    arrows: false,
    fade: true,
    asNavFor: '.slider'
  });
})
