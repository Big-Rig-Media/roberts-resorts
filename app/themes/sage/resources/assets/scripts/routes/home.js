export default {
  init() {
    // JavaScript to be fired on the home page
    const form = document.querySelector('.js-book-resorts')

    // Handle form submission
    if (form) {
      form.addEventListener('submit', (e) => {
        e.preventDefault()

        if ( e.submitter.name !== 'explore' ) {
          const resort = e.target['resort'].value
          const checkIn = e.target['check-in'].value
          const checkOut = e.target['check-out'].value
          const adults = e.target['adults'].value

          window.open(`https://www.campspot.com/book/${resort}/search/${checkIn}/${checkOut}/guests${adults},0,0`)
        } else {
          const resort = e.target['resort'].options[e.target['resort'].selectedIndex].dataset.slug

          window.location.replace(`/resorts/${resort}`)
        }
      })
    }

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
