export default {
  init() {
    // JavaScript to be fired on the home page

    // Handle carousel
    if ($('.js-videos-carousel').length && $('.js-videos-carousel-nav').length) {
      $('.js-videos-carousel').slick({
        asNavFor: '.js-videos-carousel-nav',
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 15000,
        arrows: false,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      })

      $('.js-videos-carousel-nav').slick({
        asNavFor: '.js-videos-carousel',
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 4,
      })
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
